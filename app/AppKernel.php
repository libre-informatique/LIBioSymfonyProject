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
    public function registerBundles()
    {
        $bundles = array(
            new Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new Sylius\Bundle\ShopBundle\SyliusShopBundle(),
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusApiBundle
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
//            new Sylius\Bundle\ApiBundle\SyliusApiBundle(),

//            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(), provided by Sylius
//            new Symfony\Bundle\SecurityBundle\SecurityBundle(), provided by Sylius
//            new Symfony\Bundle\TwigBundle\TwigBundle(), provided by Sylius
//            new Symfony\Bundle\MonologBundle\MonologBundle(), provided by Sylius
//            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(), provided by Sylius
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),

//            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(), provided by Sylius
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

//            new Knp\Bundle\MenuBundle\KnpMenuBundle(), provided by Sylius

//            new Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),

            new JMS\AopBundle\JMSAopBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
//            new JMS\SerializerBundle\JMSSerializerBundle($this), provided by Sylius

//            new winzou\Bundle\StateMachineBundle\winzouStateMachineBundle(), provided by Sylius

//            new FOS\RestBundle\FOSRestBundle(),

            new JeroenDesloovere\Bundle\VCardBundle\JeroenDesloovereVCardBundle(),

//            new Sonata\CoreBundle\SonataCoreBundle(),  provided by Sylius
            new Sonata\AdminBundle\SonataAdminBundle(),
//            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
//            new Sonata\IntlBundle\SonataIntlBundle(), provided by Sylius

            new Blast\CoreBundle\BlastCoreBundle(),
            new Blast\OuterExtensionBundle\BlastOuterExtensionBundle(),
            new Blast\BaseEntitiesBundle\BlastBaseEntitiesBundle(),
            new Blast\UtilsBundle\BlastUtilsBundle(),
            new Blast\DoctrinePgsqlBundle\BlastDoctrinePgsqlBundle(),

            new Librinfo\DecoratorBundle\LibrinfoDecoratorBundle(),
            new Librinfo\CRMBundle\LibrinfoCRMBundle(),
            new Librinfo\SonataSyliusUserBundle\SonataSyliusUserBundle(),
            new Librinfo\VarietiesBundle\LibrinfoVarietiesBundle(),
            new Librinfo\SeedBatchBundle\LibrinfoSeedBatchBundle(),
            new Librinfo\EmailBundle\LibrinfoEmailBundle(),
            new Librinfo\EmailCRMBundle\LibrinfoEmailCRMBundle(),
            new Librinfo\MediaBundle\LibrinfoMediaBundle(),
            new Librinfo\EcommerceBundle\LibrinfoEcommerceBundle(),
            new AppBundle\AppBundle(),

            new Sparkling\VATBundle\SparklingVATBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
            new Blast\DoctrineSessionBundle\BlastDoctrineSessionBundle(),
            new Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),

            new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            //            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle(); provided by Sylius
            //            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(); provided by Sylius
            //            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            //            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(); provided by Sylius
            $bundles[] = new Alex\DoctrineExtraBundle\AlexDoctrineExtraBundle();
            $bundles[] = new Trappar\AliceGeneratorBundle\TrapparAliceGeneratorBundle();
        }

        return array_merge(parent::registerBundles(), $bundles);
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(sprintf(
            '%s/config/config_%s.yml',
            $this->getRootDir(),
            $this->getEnvironment()
        ));
    }

    public function getCacheDir()
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

    public function getLogDir()
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

    private function getInstance()
    {
        $parts = explode('/', dirname(__DIR__));

        return sprintf(
            '%s-%s',
            $parts[count($parts) - 1],
            md5(dirname(__DIR__))
        );
    }
}
