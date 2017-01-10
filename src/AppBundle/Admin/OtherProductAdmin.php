<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\ProductBundle\Admin\ProductAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sylius\Component\Product\Model\ProductInterface;

/**
 * Sonata admin for seeds products
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class OtherProductAdmin extends ProductAdmin
{
    protected $baseRouteName = 'admin_libio_other_product';
    protected $baseRoutePattern = 'libio/other_product';
    protected $classnameLabel = 'OtherProduct';

    /**
     * @return array
     */
    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(), []
        );
    }

    /**
     * Configure routes for list actions
     *
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->andWhere(
            $query->expr()->isNull("$alias.variety")
        );
        return $query;
    }

    /**
     * @return ProductInterface
     */
    public function getNewInstance()
    {
        $factory = $this->getConfigurationPool()->getContainer()->get('sylius.factory.product');
        $object = $factory->createNew();

        foreach ($this->getExtensions() as $extension) {
            $extension->alterNewInstance($this, $object);
        }
        return $object;
    }

    public function prePersistOrUpdate($object, $method)
    {
        parent::prePersistOrUpdate($object, $method);
    }
}