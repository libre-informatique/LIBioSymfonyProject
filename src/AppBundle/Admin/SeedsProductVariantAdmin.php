<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\EcommerceBundle\Admin\ProductVariantAdmin;
use Librinfo\EcommerceBundle\Entity\Product;

/**
 * Sonata admin for product variants from seeds products
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductVariantAdmin extends ProductVariantAdmin
{
    protected $baseRouteName = 'admin_libio_seeds_productvariant';
    protected $baseRoutePattern = 'libio/seeds_productvariant';
    protected $classnameLabel = 'SeedsProductVariant';

    protected $productAdminCode = 'libio.admin.seeds_product';

    public function configureFormFields(\Sonata\AdminBundle\Form\FormMapper $mapper)
    {
        parent::configureFormFields($mapper);

        // packaging field
        $mapper->add('packaging', 'entity', [
            'query_builder' => $this->optionValuesQueryBuilder(),
            'class' => 'Librinfo\\EcommerceBundle\\Entity\\ProductOptionValue',
            'multiple' => false,
            'required' => true,
            'choice_label' => 'value',
        ]);

        // seedBatch field
        $mapper->remove('optionValues');
        $product = $this->getProduct();
        $options = [
            'property' => 'code',
            'required' => true,
            'callback' => function ($admin, $property, $value) use ($product) {
                $datagrid = $admin->getDatagrid();
                $datagrid->setValue($property, null, $value);
                if ($product && $variety = $product->getVariety)
                    $datagrid->setValue('variety', null, $variety);
            },
        ];
        $fieldDescriptionOptions = ['admin_code' => 'librinfo_seedbatch.admin.seedbatch'];
        $mapper->add('seedBatch', 'sonata_type_model_autocomplete', $options, $fieldDescriptionOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->leftJoin("$alias.product", "prod");
        $query->andWhere(
            $query->expr()->isNotNull("prod.variety")
        );
        return $query;
    }

    /**
     * {@inheritdoc}
     */
    protected function optionValuesQueryBuilder()
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('sylius.repository.product_option_value');
        $queryBuilder = $repository->createQueryBuilder('pov')
            ->leftJoin('pov.option', 'option')
            ->andWhere('option.code = :packagingCode')
            ->setParameter('packagingCode', Product::$PACKAGING_OPTION_CODE)
        ;
        return $queryBuilder;
    }

}