<?php

/*
 * This file is part of the BLAST package <http://blast.libre-informatique.fr>.
 *
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\CoreBundle\Admin\CoreAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class VarietyPackagingAdmin extends CoreAdmin
{
    /**
     * @param FormMapper $mapper
     */
    protected function configureFormFields(FormMapper $mapper)
    {
        $mapper
            ->add('code')
            ->add('weight')
            ->add('bulk')
        ;
    }

    /**
     * @param ShowMapper $mapper
     */
    protected function configureShowFields(ShowMapper $mapper)
    {
        $mapper
            ->add('code')
            ->add('weight')
            ->add('bulk')
        ;
    }

    /**
     * @param ListMapper $mapper
     */
    protected function configureListFields(ListMapper $mapper)
    {
        $mapper
            ->add('code')
            ->add('weight')
            ->add('bulk')
        ;
    }

    /**
     * @param DatagridMapper $mapper
     */
    protected function configureDatagridFilters(DatagridMapper $mapper)
    {
        $mapper
            ->add('code')
            ->add('weight')
            ->add('bulk')
        ;
    }
}
