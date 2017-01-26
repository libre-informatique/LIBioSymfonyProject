<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 * Copyright (C) Paweł Jędrzejewski
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\Sylius;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * @author Kamil Kokot <kamil.kokot@lakion.com>
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class ProductFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lisem_product';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('name')->cannotBeEmpty()->end()
                ->scalarNode('code')->cannotBeEmpty()->end()
                ->booleanNode('enabled')->end()
                ->scalarNode('short_description')->cannotBeEmpty()->end()
                ->scalarNode('description')->cannotBeEmpty()->end()
                ->scalarNode('main_taxon')->cannotBeEmpty()->end()
                ->arrayNode('taxons')->prototype('scalar')->end()->end()
                ->arrayNode('channels')->prototype('scalar')->end()->end()
                ->arrayNode('product_attributes')->prototype('scalar')->end()->end()
                ->arrayNode('product_options')->prototype('scalar')->end()->end()
                ->arrayNode('images')->prototype('scalar')->end()->end()
                ->scalarNode('variety')->end()
        ;
    }
}