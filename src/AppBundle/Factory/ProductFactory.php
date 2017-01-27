<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Factory;

use Librinfo\EcommerceBundle\Entity\Product;
use Librinfo\VarietiesBundle\Entity\Variety;
use Sylius\Component\Product\Factory\ProductFactory as BaseProductFactory;
use Sylius\Component\Product\Repository\ProductOptionRepositoryInterface;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class ProductFactory extends BaseProductFactory
{
    /**
     * @var ProductOptionRepositoryInterface
     */
    private $productOptionRepository;

    public function setProductOptionRepository(ProductOptionRepositoryInterface $repository)
    {
        $this->productOptionRepository = $repository;
    }

    /**
     * @param  boolean $seedsProduct
     * @return Product
     */
    public function createNew($seedsProduct = false)
    {
        $product = parent::createNew();

        if ($seedsProduct) {
            $this->setDefaultOptions($product);
        }

        return $product;
    }

    /**
     * @param  boolean $seedsProduct
     * @return Product
     */
    public function createWithVariant($seedsProduct = false)
    {
        $product = parent::createWithVariant();

        if ($seedsProduct) {
            $this->setDefaultOptions($product);
        }

        return $product;
    }

    /**
     * @param  Variety $variety
     * @return Product
     * @todo   Add default taxonomy based on variety taxonomy
     */
    public function createNewForVariety(Variety $variety)
    {
        $product = $this->createNew(true);
        $product->setVariety($variety);
        $product->setName((string)$variety);
        $product->setCode(sprintf('%s-%s', $variety->getSpecies()->getCode(), $variety->getCode()));
        // TODO: default taxonomy
        
        return $product;
    }

    /**
     * @param Product $product
     */
    private function setDefaultOptions($product)
    {
        $packagingOption = $this->productOptionRepository->findOneBy(['code' => Product::$PACKAGING_OPTION_CODE]);
        if (!$packagingOption) {
            throw new \RuntimeException(sprintf('Product option with code "%s" does not exist in database. It is required for LISem project.'), Product::$PACKAGING_OPTION_CODE);
        }
        $product->addOption($packagingOption);
    }
}