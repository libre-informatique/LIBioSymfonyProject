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
            // the name of the command (the part after "bin/console")
            ->setName('libio:install:app-data')

            // the short description shown while running "php bin/console list"
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

    protected function initProductAttributes(OutputInterface $output)
    {
        $attributeFactory = $this->container->get('sylius.factory.product_attribute');
        $attribute = $attributeFactory->createWithType('integer')
            ->setCode('_libio_weight')
            ->setName('Poids')
        ;
        $this->container->get('sylius.repository.product_attribute')->add($attribute);
    }
}