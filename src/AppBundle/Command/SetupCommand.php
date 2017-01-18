<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Command;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Librinfo\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

/**
 * Initializes the database for Libio project
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SetupCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('libio:install:setup')
            ->setDescription('Libio configuration setup.')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('with-samples', null, InputOption::VALUE_NONE, 'Load sample data fixture'),
                ]))
            ->setHelp(<<<EOT
The <info>%command.name%</info> command allows user to configure basic Libio application data.
EOT
            )
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @todo  Exception handling
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('with-samples')) {
            $output->writeln(['', '<question>This will erease the existing data.</question>']);
            $helper = $this->getHelper('question');
            $question = new ConfirmationQuestion('Continue with this action [y|N] ? ', false);
            if (!$helper->ask($input, $output, $question))
                return;

            $this->purgeDatabase($output);
        }

        $this->setupSylius($output);
        $this->setupUsers($output);
        $this->setupCircles($output);
        $this->setupProductOptions($output);
        $this->setupCities($output);
        if ($input->getOption('with-samples'))
            $this->setupSampleData($output);
    }

    /**
     * Run command: app/console sylius:install:setup --no-interaction
     * @param OutputInterface $output
     * @return int
     */
    protected function setupSylius(OutputInterface $output)
    {
        $output->writeln(['', 'Running <info>sylius:install:setup --no-interaction</info> command...']);
        $command = $this->getApplication()->find('sylius:install:setup');
        $commandInput = new ArrayInput(['--no-interaction' => true]);
        return $command->run($commandInput, $output);
    }

    /**
     *
     * @param OutputInterface $output
     * @return int
     */
    protected function setupUsers(OutputInterface $output)
    {
        $output->writeln(['', 'Setting up application users...']);

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $repo = $em->getRepository('LibrinfoUserBundle:User');

        $warn = false;
        if (!$this->getContainer()->getParameter('libio.user.datafixtures'))
            $warn = 'Parameter libio.user.datafixtures is not defined.';
        else {
            $users = $this->getContainer()->getParameter('libio.user.datafixtures');
            if (empty($users))
                $warn = 'Parameter libio.user.datafixtures is empty.';
        }
        if ($warn) {
            $output->writeln(['<comment>', $warn, 'See app/config/parameters.yml.dist for an example.', '</comment>']);
            return 1;
        }

        $created = false;
        foreach ($users as $u) {
            $output->write(sprintf('%s <%s>', $u['username'], $u['email']));
            if (null !== $repo->findOneByUsername($u['username'])) {
                $output->writeln(' <info>exists</info>');
                continue;
            }
            $adminUser = new User();
            $adminUser
                ->setUsername($u['username'])
                ->setPlainPassword($u['password'])
                ->setEmail($u['email'])
                ->setEnabled(true)
                ->setSuperAdmin(empty($u['super']) ? false : true);
            $em->persist($adminUser);
            $created = true;
            $output->writeln(' <info>added</info>');
        }

        if ($created)
            $em->flush();

        return 0;
    }

    /**
     * Run command: app/console librinfo:crm:init-circles
     * @param OutputInterface $output
     * @return int
     */
    protected function setupCircles(OutputInterface $output)
    {
        $output->writeln(['', 'Running <info>librinfo:crm:init-circles</info> command...']);
        $command = $this->getApplication()->find('librinfo:crm:init-circles');
        $circlesInput = new ArrayInput([]);
        return $command->run($circlesInput, $output);
    }

    /**
     * Create application product application
     * @param OutputInterface $output
     * @return int
     *
     * @todo Hardcoded product options should be moved to application params (same way as initCircles...)
     */
    protected function setupProductOptions(OutputInterface $output)
    {
        $output->writeln(['', 'Initializing application specific <info>Product Options</info>...']);
        $options = [
            ['code' => '_libio_packaging',  'name' => 'Conditionnement', 'type' => 'text', 'values' => [
                'BULK' => ['locale' => 'fr_FR', 'value' => 'Vrac'],
                '1G' => ['locale' => 'fr_FR', 'value' => '1g'],
                '5G' => ['locale' => 'fr_FR', 'value' => '5g'],
                '20S' => ['locale' => 'fr_FR', 'value' => '20 graines'],
                '50S' => ['locale' => 'fr_FR', 'value' => '50 graines'],
            ]],
            ['code' => '_libio_seedbatch',  'name' => 'Lot', 'type' => 'text'],
        ];

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $optionRepository = $this->getContainer()->get('sylius.repository.product_option');
        $optionFactory = $this->getContainer()->get('sylius.factory.product_option');
        $optionValueRepository = $this->getContainer()->get('sylius.repository.product_option_value');
        $optionValueFactory = $this->getContainer()->get('sylius.factory.product_option_value');

        foreach ($options as $o) {
            $option = $optionRepository->findOneByCode($o['code']);
            if (!$option) {
                $output->write(sprintf('Creating product option "%s"', $o['code']));
                $option = $optionFactory->createNew();
                $option->setCode($o['code']);
                $option->setName($o['name']);
                $optionRepository->add($option);
            }
            else {
                $output->write(sprintf('Updating product option "%s"', $o['code']));
                $option->setName($o['name']);
                $em->persist($option);
            }

            if (!empty($o['values'])) foreach ($o['values'] as $code => $v) {
                $optionValue = $optionValueRepository->findOneByCode($code);
                if (!$optionValue || !$option->hasValue($optionValue)) {
                    $output->write(sprintf(' - Creating product option value "%s"', $code));
                    $optionValue = $optionValueFactory->createNew();
                    $optionValue->setCode($code);
                    $optionValue->setValue($v['value']);
                    $optionValue->setFallbackLocale($v['locale']);
                    $optionValue->setCurrentLocale($v['locale']);
                    $option->addValue($optionValue);
                    $optionValueRepository->add($optionValue);
                }
                else {
                    $output->write(sprintf(' - Updating product option value "%s"', $code));
                    $optionValue->setValue($v['value']);
                    $optionValue->setFallbackLocale($v['locale']);
                    $optionValue->setCurrentLocale($v['locale']);
                    $em->persist($optionValue);
                }
            }

            $em->flush();
            $output->writeln('<info> done.</info>');
        }
        return 0;
    }

    /**
     * Create application product attributes
     * Not used anymore. Left here as an example...
     *
     * @param OutputInterface $output
     * @return int
     *
     * @todo Hardcoded attributes should be moved to application params (same way as initCircles...)
     */
    protected function setupProductAttributes(OutputInterface $output)
    {
        $output->writeln(['', 'Initializing application specific <info>Product Attributes</info>...']);
        $attributes = [
            ['code' => '_libio_packaging',  'name' => 'Conditionnement', 'type' => 'text'],
            ['code' => '_libio_base_price', 'name' => 'Prix',  'type' => 'integer'],
        ];
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $repository = $this->getContainer()->get('sylius.repository.product_attribute');
        $factory = $this->getContainer()->get('sylius.factory.product_attribute');
        $registry = $this->getContainer()->get('sylius.registry.attribute_type');

        foreach ($attributes as $a) {
            $attribute = $repository->findOneByCode($a['code']);
            if (!$attribute) {
                $output->write(sprintf('Creating product attribute with code "%s"', $a['code']));
                $attribute = $factory->createTyped($a['type']);
                $attribute->setCode($a['code']);
                $attribute->setName($a['name']);
                $repository->add($attribute);
            }
            else {
                $output->write(sprintf('Updating product attribute with code "%s"', $a['code']));
                $storageType = $registry->get($a['type'])->getStorageType();
                $attribute->setCode($a['code']);
                $attribute->setName($a['name']);
                $attribute->setType($a['type']);
                $attribute->setStorageType($storageType);
                $em->persist($attribute);
                $em->flush();
            }
            $output->writeln('<info> done.</info>');
        }
        return 0;
    }

    /**
     * @param OutputInterface $output
     * @todo  Optimize the "clean" way of importing cities
     */
    protected function setupCities(OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $conn = $em->getConnection();
        $file = __DIR__ . '/../DataFixtures/ORM/Cities/france.csv';
        $output->writeln(['', sprintf('Importing <info>cities</info> from %s...', realpath($file))]);

        try{
            // This is not clean, but it is FAST:
            $conn->exec("TRUNCATE TABLE librinfo_crm_city");
            $num_rows_effected = $conn->exec("COPY librinfo_crm_city (id, country_code, city, zip) FROM '$file' delimiter ',';");
            $output->writeln(sprintf('<info> done (%d cities).</info>', $num_rows_effected));
        }catch(\Exception $e){
            // This is clean but it is SLOW:
            $em->getConnection()->getConfiguration()->setSQLLogger(null);
            $em->createQuery('DELETE FROM LibrinfoCRMBundle:City')->execute();
            $handle = fopen($file, 'r');
            $i = 0;
            $batchSize = 20;
            while (($line = fgetcsv($handle)) !== FALSE) {
                $i++;
                $city = new \Librinfo\CRMBundle\Entity\City();
                $city->setCountryCode($line[1]);
                $city->setCity($line[2]);
                $city->setZip($line[3]);
                $em->persist($city);
                if (($i % $batchSize) === 0) {
                    $em->flush();
                    $em->clear();
                }
            }
            fclose($handle);
            $em->flush();
            $em->clear();
            $output->writeln(sprintf('<info> done (%d cities).</info>', $i));
        }
    }

    /**
     * @param OutputInterface $output
     */
    protected function purgeDatabase(OutputInterface $output)
    {
        $output->writeln('');
        $output->write('Purging database...');
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $purger = new ORMPurger($em);
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_DELETE); // Seems faster than PURGE_MODE_TRUNCATE
        $purger->purge();
        $output->writeln('<info> done.</info>');
    }

    /**
     * @param OutputInterface $output
     */
    protected function setupSampleData(OutputInterface $output)
    {
        $output->writeln(['', 'Running <info>doctrine:fixtures:load --append --fixtures=src/AppBundle/DataFixtures</info> command...']);
        $fixturesCommand = $this->getApplication()->find('doctrine:fixtures:load');
        $fixturesInput = new ArrayInput([
            '--append' => true,
            '--fixtures' => 'src/AppBundle/DataFixtures'
        ]);
        $fixturesInput->setInteractive(false);
        $fixturesCommand->run($fixturesInput, $output);

    }
}