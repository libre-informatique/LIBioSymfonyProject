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

namespace VarietyBundle\Admin;

use Blast\Bundle\CoreBundle\Admin\CoreAdmin;
use Blast\Bundle\CoreBundle\Admin\Traits\HandlesRelationsAdmin;

class FamilyAdmin extends CoreAdmin
{
    use HandlesRelationsAdmin;

    /**
     * @var string
     */
    protected $translationLabelPrefix = 'sil.variety.family';

    public function getExportFields()
    {
        return [
            'name',
            'latinName',
            'alias',
            'description',
            'createdAt',
            'updatedAt',
        ];
    }
}
