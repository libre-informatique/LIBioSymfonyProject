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

namespace LisemBundle\Admin;

use Sil\Bundle\EcommerceBundle\Admin\ProductAdmin;
use VarietyBundle\Entity\Variety;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DatagridBundle\ProxyQuery\ProxyQueryInterface;
use Sylius\Component\Product\Model\ProductInterface;

/**
 * Sonata admin for seeds products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductAdmin extends ProductAdmin
{
    protected $classnameLabel = 'SeedsProduct';

    protected $baseRouteName = 'admin_seed_product';
    protected $baseRoutePattern = 'seed_product';

    /**
     * @var Variety
     */
    private $variety;

    /**
     * @param string $context NEXT_MAJOR: remove this argument
     *
     * @return ProxyQueryInterface
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->andWhere(
            $query->expr()->isNotNull("$alias.variety")
        );

        return $query;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->remove('delete');
    }

    /**
     * @return ProductInterface
     */
    public function getNewInstance()
    {
        $factory = $this->getConfigurationPool()->getContainer()->get('sylius.factory.product');
        $object = $this->getVariety() ?
            $factory->createNewForVariety($this->getVariety()) :
            $factory->createNew(true)
        ;

        foreach ($this->getExtensions() as $extension) {
            $extension->alterNewInstance($this, $object);
        }

        return $object;
    }

    /**
     * @return Variety|null
     *
     * @throws \Exception
     */
    public function getVariety()
    {
        if ($this->variety) {
            return $this->variety;
        }

        if ($this->subject && $variety = $this->subject->getVariety()) {
            $this->variety = $variety;

            return $variety;
        }

        if ($variety_id = $this->getRequest()->get('variety_id')) {
            $variety = $this->modelManager
                ->getEntityManager('VarietyBundle:Variety')
                ->getRepository('VarietyBundle:Variety')
                ->find($variety_id);
            if (!$variety) {
                throw new \Exception(sprintf('Unable to find Variety with id : %s', $variety_id));
            }
            $this->variety = $variety;

            return $variety;
        }

        return null;
    }

    public function SonataTypeModelAutocompleteCallback($admin, $property, $value)
    {
        $datagrid = $admin->getDatagrid();
        $qb = $datagrid->getQuery();
        $alias = $qb->getRootAlias();
        $qb
            ->leftJoin("$alias.translations", 'translations')
            ->andWhere($qb->expr()->orX(
                'translations.name LIKE :value',
                $alias . '.code LIKE :value'
            ))
            ->setParameter('value', "%$value%")
        ;
    }
}
