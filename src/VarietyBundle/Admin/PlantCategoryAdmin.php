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
use Blast\Bundle\CoreBundle\Admin\Traits\Base as BaseAdmin;
use Blast\Bundle\BaseEntitiesBundle\Admin\Traits\NestedTreeableAdmin;

class PlantCategoryAdmin extends CoreAdmin
{
    use BaseAdmin,
       NestedTreeableAdmin
    ;

    /**
     * @var string
     */
    protected $translationLabelPrefix = 'sil.variety.plant_category';
}