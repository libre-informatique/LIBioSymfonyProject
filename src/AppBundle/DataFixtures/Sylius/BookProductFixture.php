<?php

/*
 * Copyright (C) Paweł Jędrzejewski
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\Sylius;

use AppBundle\DataFixtures\Sylius\ProductFixture;
use Sylius\Bundle\CoreBundle\Fixture\ProductAttributeFixture;
use Sylius\Bundle\CoreBundle\Fixture\TaxonFixture;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Attribute\AttributeType\IntegerAttributeType;
use Sylius\Component\Attribute\AttributeType\TextAttributeType;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Kamil Kokot <kamil.kokot@lakion.com>
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class BookProductFixture extends AbstractFixture
{
    /**
     * @var TaxonFixture
     */
    private $taxonFixture;

    /**
     * @var ProductAttributeFixture
     */
    private $productAttributeFixture;

    /**
     * @var ProductFixture
     */
    private $productFixture;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param TaxonFixture $taxonFixture
     * @param ProductAttributeFixture $productAttributeFixture
     * @param ProductFixture $productFixture
     */
    public function __construct(
        TaxonFixture $taxonFixture,
        ProductAttributeFixture $productAttributeFixture,
        ProductFixture $productFixture
    ) {
        $this->taxonFixture = $taxonFixture;
        $this->productAttributeFixture = $productAttributeFixture;
        $this->productFixture = $productFixture;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setRequired('amount')
                ->setAllowedTypes('amount', 'int')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lisem_book_product';
    }

    /**
     * {@inheritdoc}
     */
    public function load(array $options)
    {
        $options = $this->optionsResolver->resolve($options);

        $this->taxonFixture->load(['custom' => [[
            'code' => 'category',
            'name' => 'Catégorie',
            'children' => [
                [
                    'code' => 'books',
                    'name' => 'Livres',
                ]
            ]
        ]]]);

        $this->productAttributeFixture->load(['custom' => [
            ['name' => 'Auteur', 'code' => 'book_author', 'type' => TextAttributeType::TYPE],
            ['name' => 'ISBN', 'code' => 'book_isbn', 'type' => TextAttributeType::TYPE],
            ['name' => 'Nombre de pages', 'code' => 'book_pages', 'type' => IntegerAttributeType::TYPE],
        ]]);

        $products = [];
        $productsNames = $this->getUniqueNames($options['amount']);
        for ($i = 0; $i < $options['amount']; ++$i) {
            $authorName = $this->faker->name;

            $products[] = [
                'name' => sprintf('Livre "%s", par %s', $productsNames[$i], $authorName),
                'code' => sprintf('LIV-%04d', $i + 1),
                'main_taxon' => 'books',
                'taxons' => ['books'],
                'product_attributes' => [
                    'book_author' => $authorName,
                    'book_isbn' => $this->faker->isbn13,
                    'book_pages' => $this->faker->numberBetween(42, 1024),
                ],
                'images' => [
                    'main' => sprintf('%s/../../Resources/fixtures/%s', __DIR__, 'books.jpg'),
                    'thumbnail' => sprintf('%s/../../Resources/fixtures/%s', __DIR__, 'books.jpg'),
                ],
            ];
        }

        $this->productFixture->load(['custom' => $products]);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode)
    {
        $optionsNode
            ->children()
                ->integerNode('amount')->isRequired()->min(0)->end()
        ;
    }

    /**
     * @param int $amount
     *
     * @return string
     */
    private function getUniqueNames($amount)
    {
        $productsNames = [];

        for ($i = 0; $i < $amount; ++$i) {
            $name = $this->faker->word;
            while (in_array($name, $productsNames)) {
                $name = $this->faker->word;
            }
            $productsNames[] = $name;
        }

        return $productsNames;
    }
}