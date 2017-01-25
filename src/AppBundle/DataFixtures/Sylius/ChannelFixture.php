<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\Sylius;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ChannelFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'lisem_channel';
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
                ->scalarNode('hostname')->cannotBeEmpty()->end()
                ->scalarNode('color')->cannotBeEmpty()->end()
                ->scalarNode('tax_calculation_strategy')->end()
                ->booleanNode('enabled')->end()
                ->scalarNode('default_locale')->cannotBeEmpty()->end()
                ->arrayNode('locales')->prototype('scalar')->end()->end()
                ->scalarNode('base_currency')->cannotBeEmpty()->end()
                ->arrayNode('currencies')->prototype('scalar')->end()->end()
                ->scalarNode('theme_name')->end()
        ;
    }
}
