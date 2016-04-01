<?php

namespace Librinfo\LibioBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Librinfo\CoreBundle\DependencyInjection\LibrinfoCoreExtension;
use Librinfo\CoreBundle\DependencyInjection\DefaultParameters;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LibrinfoLibioExtension extends LibrinfoCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');

        if ($container->getParameter('kernel.environment') == 'test')
        {
            $loader->load('datafixtures.yml');
        }

        $this->mergeParameter('librinfo', $container, __DIR__ . '/../Resources/config');
    }
}
