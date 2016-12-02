<?php

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new Sylius\Bundle\ShopBundle\SyliusShopBundle(),
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusApiBundle
            new Sylius\Bundle\ApiBundle\SyliusApiBundle(),

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

            new FOS\UserBundle\FOSUserBundle(),
//            new FOS\RestBundle\FOSRestBundle(),

            new JeroenDesloovere\Bundle\VCardBundle\JeroenDesloovereVCardBundle(),

            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
//            new Sonata\IntlBundle\SonataIntlBundle(), provided by Sylius

            new Blast\CoreBundle\BlastCoreBundle(),
            new Blast\OuterExtensionBundle\BlastOuterExtensionBundle(),
            new Blast\BaseEntitiesBundle\BlastBaseEntitiesBundle(),
            new Blast\UtilsBundle\BlastUtilsBundle(),
            
            new Librinfo\DecoratorBundle\LibrinfoDecoratorBundle(),
            new Librinfo\UIBundle\LibrinfoUIBundle(),
            new Librinfo\SecurityBundle\LibrinfoSecurityBundle(),
            new Librinfo\CRMBundle\LibrinfoCRMBundle(),
            new Librinfo\UserBundle\LibrinfoUserBundle(),
            new Librinfo\DoctrinePgsqlBundle\LibrinfoDoctrinePgsqlBundle(),
            new Librinfo\VarietiesBundle\LibrinfoVarietiesBundle(),
            new Librinfo\SeedBatchBundle\LibrinfoSeedBatchBundle(),
            new Librinfo\EmailBundle\LibrinfoEmailBundle(),
            new Librinfo\EmailCRMBundle\LibrinfoEmailCRMBundle(),
            new Librinfo\MediaBundle\LibrinfoMediaBundle(),
            new Librinfo\ProductBundle\LibrinfoProductBundle(),
            new AppBundle\AppBundle(),

            new Sparkling\VATBundle\SparklingVATBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test')))
        {
//            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle(); provided by Sylius
//            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(); provided by Sylius
//            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
//            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(); provided by Sylius
            $bundles[] = new Alex\DoctrineExtraBundle\AlexDoctrineExtraBundle();
            $bundles[] = new Hautelook\AliceBundle\HautelookAliceBundle();
        }

        return array_merge(parent::registerBundles(), $bundles);
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
