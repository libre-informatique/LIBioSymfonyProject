<?php

/*
 * This file is part of the Lisem Project.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace LisemBundle\Command;

use Sil\Bundle\VarietyBundle\Entity\Family;
use Sil\Bundle\VarietyBundle\Entity\Genus;
use Sil\Bundle\VarietyBundle\Entity\Species;
use Sil\Bundle\VarietyBundle\Entity\Variety;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Blast\Bundle\CsvImportBundle\Command\ImportCsvCommand;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class LisemImportCsvCommand extends ImportCsvCommand
{
    /**
     * @var array
     */
    protected $speciesCodes = [];

    /**
     * @var array
     */
    protected $varietyCodes = [];

    protected function configure()
    {
        $this
        ->setName('lisem:import:csv')
        ->setDescription('Import data from CSV files into LiSem.')
        ->addArgument('dir', InputArgument::REQUIRED, 'The directory containing the CSV files.')
        ->setHelp(<<<EOT
The <info>%command.name%</info> command allows user to populate LiSem application with CSV data files.
EOT
        )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @todo: should be in config and load in init, and this method will not be need */
        $this->importClass = [
            Family::class,
            Genus::class,
            Species::class,
            Variety::class,
        ];

        parent::execute($input, $output);
    }

    /**
     * @param Species $species
     */
    protected function postDeserializeSpecies(Species $species)
    {
        $codeGenerator = $this->getContainer()->get('sil_variety.code_generator.species');
        $code = $codeGenerator::generate($species, $this->speciesCodes);
        $this->speciesCodes[] = $code;
        $species->setCode($code);
    }

    /**
     * @param Variety $variety
     */
    protected function postDeserializeVariety(Variety $variety)
    {
        $code = $variety->getCode();
        if (!$code) {
            $codeGenerator = $this->getContainer()->get('sil_variety.code_generator.variety');
            $code = $codeGenerator::generate($variety, $this->varietyCodes);
            $variety->setCode($code);
        }
        $this->varietyCodes[] = $code;
    }
}
