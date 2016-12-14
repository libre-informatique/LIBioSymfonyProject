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
use Librinfo\UserBundle\Entity\User;
use Nelmio\Alice\Fixtures;
use Nelmio\Alice\Fixtures\Loader;
use Nelmio\Alice\Persister\Doctrine as DoctrinePersister;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
        return 0;
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

        $userFixtures = $this->loadYml('user.yml');
        $this->user = $userFixtures['user'];

        $varietyFixtures = $this->loadYml('variety.yml');

        $crmFixtures = $this->loadYml('crm.yml');
    }

    protected function loadYml($filename)
    {
        $loader = new \Nelmio\Alice\Fixtures\Loader();
        $objects = $this->aliceLoader->load(__DIR__.'/'.$filename);
        $this->alicePersister->persist($objects);
        return $objects;
    }
}