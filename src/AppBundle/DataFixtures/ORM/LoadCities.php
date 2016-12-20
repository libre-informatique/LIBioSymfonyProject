<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 *
 * @todo   Move this to LibrinfoCRMBundle
 */
class LoadCities extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        return 10;
    }

    /**
     * load
     *
     * @param ObjectManager $manager
     * @todo  Import all CSV files found in the Cities directory
     * @todo  Optimize the "clean" way of importing cities
     */
    public function load(ObjectManager $manager)
    {
        $conn = $manager->getConnection();
        $file = __DIR__ . '/Cities/france.csv';

        // This is not clean, but it is FAST:
        $conn->exec("TRUNCATE TABLE librinfo_crm_city");
        $num_rows_effected = $conn->exec("COPY librinfo_crm_city (id, country_code, city, zip) FROM '$file' delimiter ',';");

        // This is clean but it is SLOW:
        /*
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);
        $manager->createQuery('DELETE FROM LibrinfoCRMBundle:City')->execute();
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
                $manager->flush();
                $manager->clear();
            }
        }
        fclose($handle);
        $manager->flush();
        $manager->clear();
        */
    }

}