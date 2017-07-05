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
use Sonata\CoreBundle\Validator\ErrorElement;

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
        $mapper->tab('form_tab_general')->with('form_group_general');

        // packaging field
        $mapper->add('packaging', 'entity', [
            'query_builder' => $this->optionValuesQueryBuilder(),
            'class' => 'Librinfo\\EcommerceBundle\\Entity\\ProductOptionValue',
            'multiple' => false,
            'required' => true,
            'choice_label' => 'value',
            'translation_domain' => 'messages',
        ]);

        // seedBatch field
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
            'translation_domain' => 'messages',
        ];
        $fieldDescriptionOptions = ['admin_code' => 'librinfo_seedbatch.admin.seedbatch','translation_domain' => 'messages'];
        $mapper->add('seedBatch', 'sonata_type_model_autocomplete', $options, $fieldDescriptionOptions);

        $mapper->end()->end();

        parent::configureFormFields($mapper);

        $mapper->remove('optionValues');

        // Remove remaining default tab
        $this->removeTab('default',$mapper);

        if($this->getSubject() && $this->getSubject()->getChannelPricings()->count() == 0) {
            $this->buildDefaultPricings($this->getSubject());
        }
    }

    // add this method
    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('packaging')
                ->assertNotBlank()
            ->end()
            ->with('seedBatch')
                ->assertNotBlank()
                ->assertNotNull()
            ->end()
        ;
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

    /**
     * @return array
     */
    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('AppBundle:SeedsProductAdmin:form_theme.html.twig')
        );
    }

}
