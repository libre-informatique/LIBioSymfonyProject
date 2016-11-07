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

namespace AppBundle\Entity;

use Librinfo\VarietiesBundle\Entity\Variety;

class VarietyPackaging extends Packaging
{
    /**
     * @var Variety
     */
    private $variety;


    /**
     * Set variety
     *
     * @param Variety $variety
     * @return VarietyPackaging
     */
    public function setVariety(Variety $variety = null)
    {
        $this->variety = $variety;

        return $this;
    }

    /**
     * Get variety
     *
     * @return Variety
     */
    public function getVariety()
    {
        return $this->variety;
    }

}
