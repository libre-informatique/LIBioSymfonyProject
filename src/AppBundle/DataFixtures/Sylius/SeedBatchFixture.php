<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\Sylius;

use Sylius\Bundle\CoreBundle\Fixture\TaxonFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class SeedBatchFixture extends AbstractResourceFixture
{
    /**
     * @var int
     */
    protected $batchSize = 1;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'seed_batch';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('variety')->end()
                ->scalarNode('seed_farm')->end()
                ->scalarNode('producer')->end()
                ->scalarNode('production_year')->end()
                ->scalarNode('plot')->end()
                ->scalarNode('batch_number')->end()
                ->scalarNode('description')->end()
        ;
    }
}