<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;
use Librinfo\CoreBundle\DependencyInjection\LibrinfoCoreExtension;
use Librinfo\CoreBundle\DependencyInjection\DefaultParameters;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AppExtension extends LibrinfoCoreExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        //$loader->load('admin.yml');
        //$loader->load('config.yml');
        //$loader->load('librinfo.yml');

        if ($container->getParameter('kernel.environment') == 'test')
        {
            $loader->load('datafixtures.yml');
        }

        $this->mergeParameter('librinfo', $container, __DIR__ . '/../Resources/config');

//        var_dump($container->getParameter('librinfo')); die();
    }
}
