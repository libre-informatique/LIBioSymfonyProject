<?php

/*
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Command;

use Doctrine\ORM\EntityManager;
use Librinfo\VarietiesBundle\Entity\Family;
use Librinfo\VarietiesBundle\Entity\Genus;
use Librinfo\VarietiesBundle\Entity\Species;
use Librinfo\VarietiesBundle\Entity\Variety;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class ImportCsvCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var string  Directory where the CSV files are located
     */
    protected $dir;

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

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $this->em = $this->getContainer()->get('doctrine')->getEntityManager();
        $this->dir = $input->getArgument('dir');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $classes = [
            Family::class,
            Genus::class,
            Species::class,
            Variety::class,
        ];
        foreach ($classes as $class)
            $this->importData($class, $output);
    }

    protected function importData($entityClass, OutputInterface $output)
    {
        $output->write("Importing <info>$entityClass</info>");
        $csv = $this->getCsvFilePath($entityClass);
        $output->write(" (".basename($csv).")...");
        $data = file_get_contents($csv);

        $normalizer = new Normalizer\CsvObjectNormalizer($entityClass, $this->em);
        $serializer = new Serializer([$normalizer, new ArrayDenormalizer()], [new CsvEncoder()]);
        $objects = $serializer->deserialize($data, $entityClass . '[]', 'csv');
        $output->writeln(sprintf(" <info>%d objects</info>", count($objects)));

        $rc = new \ReflectionClass($entityClass);
        $method = 'postDeserialize' . $rc->getShortName();

        foreach ($objects as $k=> $object) {
            if (method_exists($this, $method))
                $this->{$method}($object);
            $this->em->persist($object);
            $this->em->flush();
        }
    }

    /**
     * @param string $entityClass
     * @return string
     * @throws \Exception
     */
    protected function getCsvFilePath($entityClass)
    {
        // TODO: this should go in a configuration file !
        $files = [
            'Librinfo\VarietiesBundle\Entity\Family' => 'famille.csv',
            'Librinfo\VarietiesBundle\Entity\Genus' => 'genre.csv',
            'Librinfo\VarietiesBundle\Entity\Species' => 'espece.csv',
            'Librinfo\VarietiesBundle\Entity\Variety' => 'variete.csv',
        ];

        if (!key_exists($entityClass, $files))
            throw new \Exception('Entity class not supported: '.$entityClass);

        $csv = $this->dir . '/' . $files[$entityClass];
        if (!file_exists($csv))
            throw new \Exception('File not found: ' . $csv);
        if (!is_readable($csv))
            throw new \Exception('File not readable: ' . $csv);

        return $csv;
    }

    /**
     * @param Species $species
     */
    protected function postDeserializeSpecies(Species $species)
    {
        $codeGenerator = $this->getContainer()->get('librinfo_varieties.code_generator.species');
        $species->setCode($codeGenerator::generate($species));
    }

    /**
     * @param Variety $variety
     */
    protected function postDeserializeVariety(Variety $variety)
    {
        $codeGenerator = $this->getContainer()->get('librinfo_varieties.code_generator.variety');
        $variety->setCode($codeGenerator::generate($variety));
    }

}