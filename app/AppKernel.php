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

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Yaml\Yaml;

class AppKernel extends Kernel
{
    public function registerBundles(): array
    {
        $bundles = [
            // Symfony bundles
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Sylius bundles
            new Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new Sylius\Bundle\ShopBundle\SyliusShopBundle(),
            new Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),

            // Sonata bundles
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Exporter\Bridge\Symfony\Bundle\SonataExporterBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),

            // FOS bundles
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

            // JMS bundles
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),

            // Other bundles
            new JeroenDesloovere\Bundle\VCardBundle\JeroenDesloovereVCardBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new Sparkling\VATBundle\SparklingVATBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
            new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new Librinfo\SyliusPayboxBundle\LibrinfoSyliusPayboxBundle(),

            // Lexik bundles
            new Lexik\Bundle\MaintenanceBundle\LexikMaintenanceBundle(),

            // Blast bundles
            new Blast\CoreBundle\BlastCoreBundle(),
            new Blast\OuterExtensionBundle\BlastOuterExtensionBundle(),
            new Blast\BaseEntitiesBundle\BlastBaseEntitiesBundle(),
            new Blast\UtilsBundle\BlastUtilsBundle(),
            new Blast\DoctrinePgsqlBundle\BlastDoctrinePgsqlBundle(),
            new Blast\DoctrineSessionBundle\BlastDoctrineSessionBundle(),

            // Librinfo bundles
            new Librinfo\DecoratorBundle\LibrinfoDecoratorBundle(),
            new Librinfo\CRMBundle\LibrinfoCRMBundle(),
            new Librinfo\SonataSyliusUserBundle\SonataSyliusUserBundle(),
            new Librinfo\VarietiesBundle\LibrinfoVarietiesBundle(),
            new Librinfo\SeedBatchBundle\LibrinfoSeedBatchBundle(),
            new Librinfo\EmailBundle\LibrinfoEmailBundle(),
            new Librinfo\EmailCRMBundle\LibrinfoEmailCRMBundle(),
            new Librinfo\MediaBundle\LibrinfoMediaBundle(),
            new Librinfo\EcommerceBundle\LibrinfoEcommerceBundle(),

            // Lisem App
            new AppBundle\AppBundle(),
        ];

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Alex\DoctrineExtraBundle\AlexDoctrineExtraBundle();
            $bundles[] = new Trappar\AliceGeneratorBundle\TrapparAliceGeneratorBundle();
            $bundles[] = new Lexik\Bundle\TranslationBundle\LexikTranslationBundle();
        }

        return array_merge(parent::registerBundles(), $bundles);
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(sprintf(
            '%s/config/config_%s.yml',
            $this->getRootDir(),
            $this->getEnvironment()
        ));
    }

    public function getCacheDir(): string
    {
        $yaml = Yaml::parse(file_get_contents(sprintf('%s/config/parameters.yml', $this->getRootDir())));

        if (isset($yaml['parameters']['cache_dir'])) {
            return sprintf(
                '%s/%s/cache/%s',
                $yaml['parameters']['cache_dir'],
                $this->getInstance(),
                $this->environment
            );
        }

        return sprintf(
            '%s/cache/%s',
            $this->rootDir,
            $this->environment
        );
    }

    public function getLogDir(): string
    {
        $yaml = Yaml::parse(file_get_contents(sprintf('%s/config/parameters.yml', $this->getRootDir())));

        if (isset($yaml['parameters']['logs_dir'])) {
            return sprintf(
                '%s/%s/logs',
                $yaml['parameters']['logs_dir'],
                $this->getInstance()
            );
        }

        return sprintf('%s/logs', $this->rootDir);
    }

    private function getInstance(): string
    {
        $parts = explode('/', dirname(__DIR__));

        return sprintf(
            '%s-%s',
            $parts[count($parts) - 1],
            md5(dirname(__DIR__))
        );
    }
}
