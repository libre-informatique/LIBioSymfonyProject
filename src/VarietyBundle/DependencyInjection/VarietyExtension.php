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

namespace VarietyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;
use Blast\Bundle\CoreBundle\DependencyInjection\BlastCoreExtension;

class VarietyExtension extends BlastCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('parameters.yml');
        $loader->load('services.yml');

        $container->setParameter('variety', $config);

        // Entity code generators
        $container->setParameter('variety.code_generator.species',
            $container->getParameter('variety')['code_generator']['species']
        );
        $container->setParameter('variety.code_generator.variety',
            $container->getParameter('variety')['code_generator']['variety']
        );

        if ($container->getParameter('kernel.environment') == 'test') {
            $loader->load('datafixtures.yml');
        }

        $this->mergeParameter('blast', $container, __DIR__ . '/../Resources/config');
    }
}
