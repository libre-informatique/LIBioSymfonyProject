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

namespace LisemBundle\DataFixtures\Sylius\Generator;

use Blast\Bundle\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use SeedBatchBundle\Entity\SeedBatchInterface;
use Sylius\Component\Product\Checker\ProductVariantsParityCheckerInterface;
use Sylius\Component\Product\Factory\ProductVariantFactoryInterface;
use Sylius\Component\Product\Generator\CartesianSetBuilder;
use Sylius\Component\Product\Generator\ProductVariantGeneratorInterface;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Product\Model\ProductVariantInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class ProductVariantGenerator implements ProductVariantGeneratorInterface
{
    /**
     * @var ProductVariantFactoryInterface
     */
    private $productVariantFactory;

    /**
     * @var CartesianSetBuilder
     */
    private $setBuilder;

    /**
     * @var ProductVariantsParityCheckerInterface
     */
    private $variantsParityChecker;

    /**
     * @var RepositoryInterface
     */
    private $channelRepository;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var CodeGeneratorInterface
     */
    private $productVariantCodeGenerator;

    /**
     * @var FactoryInterface
     */
    private $channelPricingFactory;

    /**
     * @param ProductVariantFactoryInterface        $productVariantFactory
     * @param ProductVariantsParityCheckerInterface $variantsParityChecker
     */
    public function __construct(
        ProductVariantFactoryInterface $productVariantFactory,
        ProductVariantsParityCheckerInterface $variantsParityChecker
    ) {
        $this->productVariantFactory = $productVariantFactory;
        $this->setBuilder = new CartesianSetBuilder();
        $this->variantsParityChecker = $variantsParityChecker;
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @param ProductInterface $product
     * @param ArrayCollection  $seedBatches
     */
    public function generate(ProductInterface $product, $seedBatches = null): void
    {
        Assert::true($product->hasOptions(), 'Cannot generate variants for an object without options.');

        if ($variety = $product->getVariety()) {
            $varietySeedBatches = $variety->getSeedBatches();
            if ($seedBatches === null) {
                $seedBatches = $varietySeedBatches;
            } else {
                $seedBatches = $seedBatches->filter(
                    function ($sb) use ($varietySeedBatches) {
                        return $varietySeedBatches->contains($sb);
                    }
                );
            }
            Assert::notEq(0, count($seedBatches), 'Cannot generate variants for a seeds product without seed batches');
        }

        $optionSet = [];
        $optionMap = [];

        foreach ($product->getOptions() as $key => $option) {
            foreach ($option->getValues() as $value) {
                $optionSet[$key][] = $value->getId();
                $optionMap[$value->getId()] = $value;
            }
        }

        $permutations = $this->setBuilder->build($optionSet);

        foreach ($permutations as $permutation) {
            $variant = $this->createVariant($product, $optionMap, $permutation);

            if ($seedBatches) {
                foreach ($seedBatches as $seedBatch) {
                    $variant->addSeedBatch($seedBatch);
                }
            }

            if (!$this->variantsParityChecker->checkParity($variant, $product)) {
                $product->addVariant($variant);
            }
        }
    }

    /**
     * @param ProductInterface $product
     * @param array            $optionMap
     * @param mixed            $permutation
     *
     * @return ProductVariantInterface
     */
    private function createVariant(ProductInterface $product, array $optionMap, $permutation)
    {
        /** @var ProductVariantInterface $variant */
        $variant = $this->updateVariantData($this->productVariantFactory->createForProduct($product), $product, $optionMap);
        $this->addOptionValue($variant, $optionMap, $permutation);

        return $variant;
    }

    private function updateVariantData(ProductVariantInterface $productVariant, ProductInterface $product, array $options, $index = 0)
    {
        $productVariant->setName($product->getVariety() ? $product->getVariety()->getName() : $product->getName());
        $code = sprintf('%s-variant-%d', uniqid(), $index);
        $productVariant->setCode($code);
        $productVariant->setOnHand(0);
        $productVariant->setShippingRequired(true);

        foreach ($this->channelRepository->findAll() as $channel) {
            $this->createChannelPricings($productVariant, $channel->getCode());
        }

        return $productVariant;
    }

    /**
     * @param ProductVariantInterface $variant
     * @param array                   $optionMap
     * @param mixed                   $permutation
     */
    private function addOptionValue(ProductVariantInterface $variant, array $optionMap, $permutation)
    {
        if (!is_array($permutation)) {
            $variant->addOptionValue($optionMap[$permutation]);

            return;
        }

        foreach ($permutation as $id) {
            if ($optionMap[$id] instanceof SeedBatchInterface) {
                $variant->addSeedBatch($optionMap[$id]);
            } else {
                $variant->addOptionValue($optionMap[$id]);
            }
        }
    }

    /**
     * @param ProductVariantInterface $productVariant
     * @param string                  $channelCode
     */
    private function createChannelPricings(ProductVariantInterface $productVariant, $channelCode)
    {
        /** @var ChannelPricingInterface $channelPricing */
        $channelPricing = $this->channelPricingFactory->createNew();
        $channelPricing->setChannelCode($channelCode);
        $channelPricing->setPrice($this->faker->randomNumber(3));

        $productVariant->addChannelPricing($channelPricing);
    }

    /**
     * @param RepositoryInterface $channelRepository
     */
    public function setChannelRepository(RepositoryInterface $channelRepository): void
    {
        $this->channelRepository = $channelRepository;
    }

    /**
     * @param CodeGeneratorInterface $productVariantCodeGenerator
     */
    public function setProductVariantCodeGenerator(CodeGeneratorInterface $productVariantCodeGenerator): void
    {
        $this->productVariantCodeGenerator = $productVariantCodeGenerator;
    }

    /**
     * @param FactoryInterface $channelPricingFactory
     */
    public function setChannelPricingFactory(FactoryInterface $channelPricingFactory): void
    {
        $this->channelPricingFactory = $channelPricingFactory;
    }
}
