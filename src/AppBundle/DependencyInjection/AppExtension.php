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

namespace AppBundle\DependencyInjection;

use Blast\CoreBundle\DependencyInjection\BlastCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AppExtension extends BlastCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        parent::load($configs, $container);
        // Loads Librinfo Decorator sonata layout insteadof blastcore layout
        $sonataTemplates = $container->getParameter('sonata.admin.configuration.templates');
        $sonataTemplates['layout'] = 'LibrinfoDecoratorBundle:Admin:layout.html.twig';
        $container->setParameter('sonata.admin.configuration.templates', $sonataTemplates);
    }
}
