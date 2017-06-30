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

namespace AppBundle\Entity\OuterExtension;

use Doctrine\Common\Collections\ArrayCollection;

trait HasPackagings
{
    /**
     * @var ArrayCollection
     */
    private $packagings;

    public function initPackagings()
    {
        $this->packagings = new ArrayCollection();
    }

    /**
     * @param $packaging
     *
     * @return self
     */
    public function addPackaging($packaging)
    {
        $this->packagings->add($packaging);

//        $this->setOwningSideRelation($packaging);

        return $this;
    }

    /**
     * @param $packaging
     *
     * @return self
     */
    public function removePackaging($packaging)
    {
        $this->packagings->removeElement($packaging);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPackagings()
    {
        return $this->packagings;
    }

    /**
     * @param ArrayCollection packagings
     *
     * @return self
     */
    public function setPackagings(ArrayCollection $packagings)
    {
        $this->packagings = $packagings;

        return $this;
    }
}
