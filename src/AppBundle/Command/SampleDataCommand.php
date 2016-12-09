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
 * Loads the sample data for Libio
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SampleDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('libio:install:sample-data')
            ->setDescription('Install sample data into Libio.')
            ->setHelp(<<<EOT
The <info>%command.name%</info> command loads the sample data for Libio.
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
        $output->writeln('<error>Warning! This will erase your database.</error>');

        if (!$this->getHelperSet()->get('dialog')->askConfirmation($output, '<question>Load sample data? (y/N)</question> ', false)) {
            $output->writeln('Cancelled loading sample data.');
            return 0;
        }

        $output->writeln(['', 'Running <info>doctrine:fixtures:load --fixtures=src/AppBundle/DataFixtures</info> command...']);
        $fixturesCommand = $this->getApplication()->find('doctrine:fixtures:load');
        $fixturesInput = new ArrayInput(['--fixtures' => 'src/AppBundle/DataFixtures']);
        $fixturesInput->setInteractive(false);
        $fixturesCommand->run($fixturesInput, $output);

        $output->writeln(['', 'Running <info>libio:install:setup</info> command...']);
        $setupCommand = $this->getApplication()->find('libio:install:setup');
        $setupInput = new ArrayInput([]);
        $setupCommand->run($setupInput, $output);
    }
}