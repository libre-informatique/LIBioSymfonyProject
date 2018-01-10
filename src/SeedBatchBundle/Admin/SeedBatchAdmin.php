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

namespace SeedBatchBundle\Admin;

use Blast\Bundle\CoreBundle\Admin\CoreAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use VarietyBundle\Entity\Variety;

class SeedBatchAdmin extends CoreAdmin
{
    /**
     * @var string
     */
    protected $translationLabelPrefix = 'sil.seed_batch.seed_batch';

    public function configureFormFields(FormMapper $mapper)
    {
        parent::configureFormFields($mapper);
        $request = $this->getConfigurationPool()->getContainer()->get('request_stack')->getMasterRequest();

        $varietyId = $request->get('variety', null);

        if ($varietyId !== null) {
            $varietyRepository = $this->getConfigurationPool()->getContainer()->get('doctrine')->getRepository(Variety::class);
            $variety = $varietyRepository->find($varietyId);
            $this->getSubject()->setVariety($variety);
        }
    }
}
