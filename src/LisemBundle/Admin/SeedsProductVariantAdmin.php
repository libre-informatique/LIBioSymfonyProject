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

use Sil\Bundle\EcommerceBundle\Admin\ProductVariantAdmin;
use LisemBundle\Entity\SilEcommerceBundle\Product;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Blast\Bundle\SearchBundle\Form\Type\AutocompleteType;

/**
 * Sonata admin for product variants from seeds products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductVariantAdmin extends ProductVariantAdmin
{
    protected $baseRouteName = 'admin_seed_product_variant';
    protected $baseRoutePattern = 'seed_product_variant';

    protected $classnameLabel = 'SeedsProductVariant';

    protected $productAdminCode = 'lisem.admin.seeds_product';

    public function configureFormFields(FormMapper $mapper)
    {
        $mapper->tab('form_tab_general')->with('form_group_general');

        // packaging field
        $mapper->add('packaging', 'entity', [
            'query_builder'      => $this->optionValuesQueryBuilder(),
            'class'              => $this->getConfigurationPool()->getContainer()->getParameter('sil.model.ecommerce_product_option_value.class'),
            'multiple'           => false,
            'required'           => true,
            'choice_label'       => 'value',
            'translation_domain' => 'messages',
        ]);

        // seedBatch field
        $product = $this->getProduct();

        $mapper->add('seedBatches', AutocompleteType::class, [
            'multiple'     => true,
            'compound'     => true,
            'elastic_type' => 'seedBatch',
            'required'     => true,
        ], [
            'admin_code'   => 'seed_batch.admin.seed_batch',
        ]);

        $mapper->end()->end();

        parent::configureFormFields($mapper);

        $mapper->remove('optionValues');

        // Remove remaining default tab
        $this->removeTab('default', $mapper);

        if ($this->getSubject() && $this->getSubject()->getChannelPricings()->count() == 0) {
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
            ->with('seedBatches')
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
        $query->leftJoin("$alias.product", 'prod');
        $query->andWhere(
            $query->expr()->isNotNull('prod.variety')
        );

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    protected function optionValuesQueryBuilder()
    {
        $repository = $this->getConfigurationPool()->getContainer()->get('sylius.repository.product_option_value');
        $queryBuilder = $repository->createQueryBuilder('pov');
        $queryBuilder
            ->join('pov.option', 'option')
            ->where('option.code = :packagingCode')
            ->setParameter('packagingCode', Product::$PACKAGING_OPTION_CODE)
        ;

        if ($this->getProduct() !== null) {
            $productVariants = $this->getProduct()->getVariants();

            $usedOptionValuesIds = [];
            foreach ($productVariants as $pv) {
                $optionValues = $pv->getOptionValues()->filter(function ($ov) {
                    return $ov->getOption()->getCode() === Product::$PACKAGING_OPTION_CODE;
                });
                foreach ($optionValues as $ov) {
                    $usedOptionValuesIds[] = $ov->getId();
                }
            }

            if ($variant = $this->getSubject()) {
                $optionValues = $variant->getOptionValues()->filter(function ($ov) {
                    return $ov->getOption()->getCode() === Product::$PACKAGING_OPTION_CODE;
                });
                foreach ($optionValues as $ov) {
                    if (in_array($ov->getId(), $usedOptionValuesIds)) {
                        unset($usedOptionValuesIds[array_search($ov->getId(), $usedOptionValuesIds)]);
                    }
                }
            }

            if (count($usedOptionValuesIds) > 0) {
                $queryBuilder
                    ->andWhere($queryBuilder->expr()->notIn('pov.id', $usedOptionValuesIds));
            }
        }

        return $queryBuilder;
    }
}
