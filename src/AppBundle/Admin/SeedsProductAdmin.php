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

namespace AppBundle\Admin;

use Librinfo\EcommerceBundle\Admin\ProductAdmin;
use Librinfo\VarietiesBundle\Entity\Variety;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DatagridBundle\ProxyQuery\ProxyQueryInterface;
use Sylius\Component\Product\Model\ProductInterface;

/**
 * Sonata admin for seeds products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductAdmin extends ProductAdmin
{
    protected $baseRouteName = 'admin_libio_seeds_product';
    protected $baseRoutePattern = 'libio/seeds_product';
    protected $classnameLabel = 'SeedsProduct';

    /**
     * @var Variety
     */
    private $variety;

    public function configureFormFields(FormMapper $mapper)
    {
        $variety = $this->getVariety();
        $request = $this->getRequest();

        $basicForm = false;
        if (null !== $request->get('btn_create_for_variety')) {
            $basicForm = true;
        } elseif ($request->getMethod() == 'GET' && !$request->get($this->getIdParameter()) && !$variety) {
            $basicForm = true;
        }

        if ($basicForm) {
            // First step creation form with just the Variety field
            $mapper
                ->with('form_tab_new_variety_variant')
                    ->add('variety', 'sonata_type_model_autocomplete',
                        ['property' => ['name', 'code'],  'required' => true],
                        ['admin_code' => 'libio.admin.variety'])
            ;

            return;
        }

        // Regular edit/create form
        parent::configureFormFields($mapper);
    }

    /**
     * @param string $context NEXT_MAJOR: remove this argument
     *
     * @return ProxyQueryInterface
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->andWhere(
            $query->expr()->isNotNull("$alias.variety")
        );

        return $query;
    }

    /**
     * @return ProductInterface
     */
    public function getNewInstance()
    {
        $factory = $this->getConfigurationPool()->getContainer()->get('sylius.factory.product');
        $object = $this->getVariety() ?
            $factory->createNewForVariety($this->getVariety()) :
            $factory->createNew(true)
        ;

        foreach ($this->getExtensions() as $extension) {
            $extension->alterNewInstance($this, $object);
        }

        return $object;
    }

    /**
     * @return Variety|null
     *
     * @throws \Exception
     */
    public function getVariety()
    {
        if ($this->variety) {
            return $this->variety;
        }

        if ($this->subject && $variety = $this->subject->getVariety()) {
            $this->variety = $variety;

            return $variety;
        }

        if ($variety_id = $this->getRequest()->get('variety_id')) {
            $variety = $this->modelManager
                ->getEntityManager('LibrinfoVarietiesBundle:Variety')
                ->getRepository('LibrinfoVarietiesBundle:Variety')
                ->find($variety_id);
            if (!$variety) {
                throw new \Exception(sprintf('Unable to find Variety with id : %s', $variety_id));
            }
            $this->variety = $variety;

            return $variety;
        }

        return null;
    }

    public function SonataTypeModelAutocompleteCallback($admin, $property, $value)
    {
        $datagrid = $admin->getDatagrid();
        $qb = $datagrid->getQuery();
        $alias = $qb->getRootAlias();
        $qb
            ->leftJoin("$alias.translations", 'translations')
            ->andWhere($qb->expr()->orX(
                'translations.name LIKE :value',
                $alias.'.code LIKE :value'
            ))
            ->setParameter('value', "%$value%")
        ;
    }

    /**
     * @return array
     */
    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('AppBundle:SeedsProductAdmin:form_theme.html.twig')
        );
    }
}
