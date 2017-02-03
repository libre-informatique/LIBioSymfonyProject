<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\EcommerceBundle\Entity\Product;
use Librinfo\VarietiesBundle\Admin\VarietyAdmin as BaseAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

/**
 * Libio Sonata admin for varieties
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class VarietyAdmin extends BaseAdmin
{
    protected $baseRouteName = 'admin_libio_variety';
    protected $baseRoutePattern = 'libio/variety';

    public function configureFormFields(\Sonata\AdminBundle\Form\FormMapper $mapper)
    {
        parent::configureFormFields($mapper);
        $mapper->add('packagings', 'sonata_type_model',
            [
            'multiple' => true,
            'required' => false,
            'query' => $this->packagingQueryBuilder(),
            ], ['admin_code' => 'lisem.admin.packaging']
        );
    }

    /**
     * @return array
     */
    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('AppBundle:VarietyAdmin:form_admin_fields.html.twig')
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

    protected function packagingQueryBuilder()
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('sylius.repository.product_option_value');
        $queryBuilder = $repository->createQueryBuilder('pov')
            ->leftJoin('pov.option', 'po')
            ->andWhere('po.code = :code')
            ->setParameter('code', Product::$PACKAGING_OPTION_CODE)
        ;
        return $queryBuilder->getQuery();
    }

}