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
use Librinfo\CRMBundle\Entity\City;
use Librinfo\CRMBundle\Entity\Contact;
use Librinfo\CRMBundle\Entity\Organism;
use Librinfo\UserBundle\Entity\User;
use Nelmio\Alice\Fixtures\Loader;
use Nelmio\Alice\Persister\Doctrine as DoctrinePersister;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Intl\Intl;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class LoadSampleData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Loader
     */
    private $aliceLoader;

    /**
     * @var DoctrinePersister
     */
    private $alicePersister;

    /**
     * @var int
     */
    private $nbCities;

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
        return 20;
    }

    /**
     * load
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $locale = $this->container->getParameter('locale');
        $this->aliceLoader = new Loader($locale);
        $this->alicePersister = new DoctrinePersister($manager);

        $this->nbCities = $this->countCities();

        $userFixtures = $this->loadYml('user.yml');
        $this->user = $userFixtures['user'];

        $varietyFixtures = $this->loadYml('variety.yml');
        $crmFixtures = $this->loadYml('crm.yml', 'prePersistCRM', 'postPersistCRM');
        $seedBatchFixtures = $this->loadYml('seed_batch.yml');
    }

    protected function loadYml($filename, $prePersist = null, $postPersist = null)
    {
        $objects = $this->aliceLoader->load(__DIR__.'/'.$filename);

        foreach($objects as $name => $object) {
            if (method_exists($object, 'setCreatedBy'))
                $object->setCreatedBy($this->user);
            if (method_exists($object, 'setUpdatedBy'))
                $object->setUpdatedBy($this->user);
            if ($prePersist) {
                $this->$prePersist($name, $object);
            }
        }
        $this->alicePersister->persist($objects);

        if ($postPersist) {
            foreach($objects as $name => $object){
                $this->$postPersist($name, $object);
            }
        }

        return $objects;
    }

    protected function percent($max)
    {
        return rand(1, 100) <= $max;
    }


    /**
     * @return int
     */
    protected function countCities()
    {
        return $this->manager->getRepository(City::class)
            ->createQueryBuilder('c')
            ->select('COUNT(c)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @return City
     */
    protected function randomCity()
    {
        return $this->manager->getRepository(City::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->setMaxResults(1)
            ->setFirstResult(rand(0, $this->nbCities - 1))
            ->getOneOrNullResult();
    }

    /**
     * @param string $name
     * @param mixed  $object
     */
    protected function prePersistCRM($name, $object)
    {
        if ($object instanceof Contact) {
            if ($this->percent(80)) {
                $city = $this->randomCity();
                $object
                    ->setZip($city->getZip())
                    ->setCity($city->getCity())
                    ->setCountry(Intl::getRegionBundle()->getCountryName($city->getCountryCode()));
            }
        }
    }

    /**
     * @param  string $name
     * @param  mixed  $object
     */
    protected function postPersistCRM($name, $object)
    {
        $registry = $this->container->get('blast_core.code_generators');

        if ($object instanceof Organism && $object->isCustomer()) {
            $customerCodeGenerator = $registry->getCodeGenerator(Organism::class, 'customerCode');
            $object->setCustomerCode($customerCodeGenerator::generate($object));
            $this->alicePersister->persist([$object]);
        }
        if ($object instanceof Organism && $object->isSupplier()) {
            $supplierCodeGenerator = $registry->getCodeGenerator(Organism::class, 'supplierCode');
            $object->setSupplierCode($supplierCodeGenerator::generate($object));
            $this->alicePersister->persist([$object]);
        }
        if ($object instanceof Organism && $object->isSeedProducer()) {
            $producerCodeGenerator = $registry->getCodeGenerator(Organism::class, 'seedProducerCode');
            $object->setSeedProducerCode($producerCodeGenerator::generate($object));
            $this->alicePersister->persist([$object]);
        }
        if (strpos($name, 'pos_ind_') === 0) {
            $contact = $object->getContact();
            $organism = $object->getOrganism();
            $organism->setName($contact->getFirstname() . ' ' . strtoupper($contact->getName()));
            $organism->setAddress($contact->getAddress());
            $organism->setZip($contact->getZip());
            $organism->setCity($contact->getCity());
            $organism->setCountry($contact->getCountry());
            $this->alicePersister->persist([$organism]);
        }

    }
}