<?php

/*
 * Copyright (C) 2016 Libre Informatique
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace AppBundle\Entity\Traits\Inverse;

use Doctrine\Common\Collections\Collection;
use AppBundle\Entity\Packaging;

/**
 * Trait for entities that have a oneToMany relationship with Packaging
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
trait HasPackagings
{
    /**
     * @var Collection
     */
    private $packagings;

    /**
     * Add packaging
     *
     * @param Packaging $packaging
     *
     * @return this
     */
    public function addPackaging($packaging)
    {
        $this->packagings[] = $packaging;

        $this->setOwningSideRelation($packaging);
        return $this;
    }

    /**
     * Remove packaging
     *
     * @param Packaging $packaging
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePackaging($packaging)
    {
        return $this->packagings->removeElement($packaging);
    }

    /**
     * Get packagings
     *
     * @return Collection
     */
    public function getPackagings()
    {
        return $this->packagings;
    }
}