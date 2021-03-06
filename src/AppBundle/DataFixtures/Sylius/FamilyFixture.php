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

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture as BaseResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class FamilyFixture extends BaseResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'family';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        $resourceNode
            ->children()
                ->scalarNode('name')->cannotBeEmpty()->end()
                ->scalarNode('latin_name')->end()
                ->scalarNode('alias')->end()
        ;
    }
}
