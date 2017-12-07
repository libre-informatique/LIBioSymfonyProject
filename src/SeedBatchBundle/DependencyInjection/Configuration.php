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

namespace SeedBatchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('seed_batch');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('code_generator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('seed_batch')->defaultValue('SeedBatchBundle\CodeGenerator\SeedBatchCodeGenerator')->end()
                        ->scalarNode('seed_producer')->defaultValue('SeedBatchBundle\CodeGenerator\SeedProducerCodeGenerator')->end()
                        ->scalarNode('plot')->defaultValue('SeedBatchBundle\CodeGenerator\PlotCodeGenerator')->end()
                        ->scalarNode('seed_farm')->defaultValue('SeedBatchBundle\CodeGenerator\SeedFarmCodeGenerator')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
