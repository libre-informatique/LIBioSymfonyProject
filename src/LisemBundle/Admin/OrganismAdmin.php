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

namespace LisemBundle\Admin;

use Sil\Bundle\CRMBundle\Admin\OrganismAdmin as BaseOrganismAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class OrganismAdmin extends BaseOrganismAdmin
{
    protected $translationLabelPrefix = 'sil.crm.organism';
    protected $baseRouteName = 'admin_crm_organism';
    protected $baseRoutePattern = 'crm/organism';

    public function createQuery($context = 'list')
    {
        $proxyQuery = parent::createQuery($context);

        $qb = $proxyQuery->getQueryBuilder();

        $qb->where('o.seedProducer = false');

        return $proxyQuery;
    }

    /**
     * @param FormMapper $mapper
     */
    protected function postConfigureFormFields(FormMapper $mapper)
    {
        $subject = $this->getSubject();
        if (!$subject->isSeedProducer()) {
            $mapper
            ->remove('seedProducer')
            ->remove('seedProducerCode');

            $this->removeTab('form_tab_plots', $mapper);
            $this->removeTab('form_tab_seedbatches', $mapper);
        }
    }
}