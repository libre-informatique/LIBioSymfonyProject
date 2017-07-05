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

namespace AppBundle\DataFixtures\Sylius;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class SpeciesFixture extends AbstractResourceFixture
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
        return 'species';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('name')->cannotBeEmpty()->end()
                ->scalarNode('latin_name')->end()
                ->scalarNode('alias')->end()
                ->scalarNode('code')->cannotBeEmpty()->end()
                ->scalarNode('parent_species')->end()
                ->scalarNode('genus')->cannotBeEmpty()->end()
        ;
    }
}
