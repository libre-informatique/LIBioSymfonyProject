<?php

/*
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace VarietyBundle\Admin;

use Sonata\CoreBundle\Validator\ErrorElement;
use Blast\Bundle\CoreBundle\Admin\CoreAdmin;
use VarietyBundle\Entity\Species;

class SpeciesAdmin extends CoreAdmin
{
    /**
     * @var string
     */
    protected $translationLabelPrefix = 'sil.variety.species';

    /**
     * @param ErrorElement $errorElement
     * @param mixed        $object
     *
     * @deprecated this feature cannot be stable, use a custom validator,
     *             the feature will be removed with Symfony 2.2
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $this->validateSpeciesCode($errorElement, $object);
    }

    /**
     * Species code validator.
     *
     * @param ErrorElement $errorElement
     * @param Species      $object
     */
    public function validateSpeciesCode(ErrorElement $errorElement, $object)
    {
        $generator = $this->getConfigurationPool()->getContainer()->get('variety.code_generator.species');
        if (!$generator->validate($object->getCode())) {
            $errorElement
                ->with('code')
                    ->addViolation('Wrong species code format')
                ->end();
        }
    }

    public function getExportFields()
    {
        return [
            'name',
            'latin_name',
            'alias',
            'code',
            'species.name',
            'description',
            'parent.name',
            'parent.code',
            'created_at',
            'updated_at',
        ];
    }
}
