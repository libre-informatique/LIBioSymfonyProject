<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Factory;

use AppBundle\Entity\SeedsProduct;
use Sylius\Component\Attribute\Repository\AttributeRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactory;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * Object factory for SeedsProduct entity
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductFactory extends ProductFactory
{
    /**
     * @var FactoryInterface
     */
    private $attributeValueFactory;

    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * @param FactoryInterface              $factory
     * @param FactoryInterface              $variantFactory
     * @param FactoryInterface              $attributeValueFactory
     * @param AttributeRepositoryInterface  $attributeRepository
     */
    public function __construct(
        FactoryInterface $factory,
        FactoryInterface $variantFactory,
        FactoryInterface $attributeValueFactory,
        AttributeRepositoryInterface $attributeRepository)
    {
        parent::__construct($factory, $variantFactory);
        $this->attributeValueFactory= $attributeValueFactory;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @return SeedsProduct
     */
    public function createNew()
    {
        $seedsProduct = parent::createNew();
        $this->setDefaultAttributes($seedsProduct);
        return $seedsProduct;
    }

    /**
     * @return SeedsProduct
     */
    public function createWithVariant()
    {
        $seedsProduct = parent::createWithVariant();
        $this->setDefaultAttributes($seedsProduct);
        return $seedsProduct;
    }

    /**
     * @param SeedsProduct $seedsProduct
     */
    private function setDefaultAttributes(SeedsProduct $seedsProduct)
    {
        $weightAttribute = $this->attributeRepository->findOneBy(['code' => '_libio_weight']);
        if (!$weightAttribute) {
            throw new \Exception('Product attribute with code "_libio_weight" does not exist in database. You should create it in order to use SeedsProduct entity.');
        }
        $weight = $this->attributeValueFactory->createNew();
        $weight->setAttribute($weightAttribute);
        $weight->setValue(0);
        $seedsProduct->addAttribute($weight);
    }
}