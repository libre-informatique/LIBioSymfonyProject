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
use Sylius\Component\Product\Repository\ProductOptionRepositoryInterface;
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
     * Not used anymore...
     */
    private $attributeRepository;

    /**
     * @var ProductOptionRepositoryInterface
     */
    private $productOptionRepository;

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
        AttributeRepositoryInterface $attributeRepository,
        ProductOptionRepositoryInterface $productOptionRepository)
    {
        parent::__construct($factory, $variantFactory);
        $this->attributeValueFactory= $attributeValueFactory;
        $this->attributeRepository = $attributeRepository;  # Not used anymore...
        $this->productOptionRepository = $productOptionRepository;
    }

    /**
     * @return SeedsProduct
     */
    public function createNew()
    {
        $seedsProduct = parent::createNew();
        // $this->setDefaultAttributes($seedsProduct);
        $this->setDefaultOptions($seedsProduct);
        return $seedsProduct;
    }

    /**
     * @return SeedsProduct
     */
    public function createWithVariant()
    {
        $seedsProduct = parent::createWithVariant();
        // $this->setDefaultAttributes($seedsProduct);
        $this->setDefaultOptions($seedsProduct);
        return $seedsProduct;
    }

    /**
     * @param SeedsProduct $seedsProduct
     */
    private function setDefaultAttributes(SeedsProduct $seedsProduct)
    {
        $packagingAttribute = $this->attributeRepository->findOneBy(['code' => '_libio_packaging']);
        if (!$packagingAttribute) {
            throw new \Exception('Product attribute with code "_libio_packaging" does not exist in database. You should create it in order to use SeedsProduct entity.');
        }
        $packaging = $this->attributeValueFactory->createNew();
        $packaging->setAttribute($packagingAttribute);
        $seedsProduct->addAttribute($packaging);

        $basePriceAttribute = $this->attributeRepository->findOneBy(['code' => '_libio_base_price']);
        if (!$basePriceAttribute) {
            throw new \Exception('Product attribute with code "_libio_base_price" does not exist in database. You should create it in order to use SeedsProduct entity.');
        }
        $basePrice = $this->attributeValueFactory->createNew();
        $basePrice->setAttribute($basePriceAttribute);
        $seedsProduct->addAttribute($basePrice);
    }

    /**
     * @param SeedsProduct $seedsProduct
     */
    private function setDefaultOptions(SeedsProduct $seedsProduct)
    {
        $packagingOption = $this->productOptionRepository->findOneBy(['code' => '_libio_packaging']);
        if (!$packagingOption) {
            throw new \Exception('Product option with code "_libio_packaging" does not exist in database. You should create it in order to use SeedsProduct entity.');
        }
        $seedsProduct->addOption($packagingOption);

        $seedBatchOption = $this->productOptionRepository->findOneBy(['code' => '_libio_seedbatch']);
        if (!$seedBatchOption) {
            throw new \Exception('Product option with code "_libio_seedbatch" does not exist in database. You should create it in order to use SeedsProduct entity.');
        }
        $seedsProduct->addOption($seedBatchOption);
    }
}