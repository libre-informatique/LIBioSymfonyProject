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

namespace VarietyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class VarietyDescriptionRepository extends EntityRepository
{
    public function getDisctinct($fieldset)
    {
        $qb = $this->createQueryBuilder('v')
                ->distinct(true);

        return $qb;
    }
}
