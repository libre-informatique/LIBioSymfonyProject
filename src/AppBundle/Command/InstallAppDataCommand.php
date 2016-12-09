<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Initializes the database for Libio project
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class InstallAppDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "app/console")
            ->setName('libio:install:app-data')

            // the short description shown while running "php app/console list"
            ->setDescription('Initializes the database for Libio project.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("Initializes the database for Libio project."
                . "\nIt creates (or updates) the application Circles and Product Attributes.")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->initCircles($output);
        $this->initProductAttributes($output);
    }

    protected function initCircles(OutputInterface $output)
    {
        $command = $this->getApplication()->find('librinfo:crm:init-circles');
        $circlesInput = new ArrayInput([]);
        return $command->run($circlesInput, $output);
    }

    /**
     * Create application product attributes
     * @param OutputInterface $output
     *
     * @todo Hardcoded attributes should be moved to application params (same way as initCircles...)
     */
    protected function initProductAttributes(OutputInterface $output)
    {
        $attributes = [
            ['code' => '_libio_weight',     'name' => 'Poids', 'type' => 'integer'],
            ['code' => '_libio_base_price', 'name' => 'Prix',  'type' => 'integer'],
            ['code' => '_libio_bulk',       'name' => 'Vrac',  'type' => 'checkbox'],
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
    }
}