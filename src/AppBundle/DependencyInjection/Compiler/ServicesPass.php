<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DependencyInjection\Compiler;

use AppBundle\Entity\SeedsProduct;
use AppBundle\Factory\SeedsProductFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Component\Resource\Factory\TranslatableFactory;


/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class ServicesPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        // SeedsProduct object factory service

        $factoryDefinition = new Definition(Factory::class);
        $factoryDefinition->addArgument(SeedsProduct::class);

        $translatableFactoryDefinition = new Definition(TranslatableFactory::class);
        $translatableFactoryDefinition->setArguments([
            $factoryDefinition,
            new Reference('sylius.locale_provider'),
        ]);

        $seedsProductFactoryDefinition = new Definition(SeedsProductFactory::class);
        $seedsProductFactoryDefinition->setArguments([
            $translatableFactoryDefinition,
            new Reference('sylius.factory.product_variant'),
            new Reference('sylius.factory.product_attribute_value'),
            new Reference('sylius.repository.product_attribute'),
            new Reference('sylius.repository.product_option'),
        ]);
        $container->setDefinition('libio.factory.seeds_product', $seedsProductFactoryDefinition);
    }
}
