<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension\LibrinfoVarietiesBundle;

use Doctrine\Common\Collections\ArrayCollection;
use Librinfo\EcommerceBundle\Entity\ProductOptionValue;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\HasSeedBatches;
    use \Librinfo\MediaBundle\Entity\OuterExtension\HasImages;
    use \Librinfo\EcommerceBundle\Entity\OuterExtension\HasProducts;
    use \Librinfo\UserBundle\Entity\Traits\Traceable;
    use \AppBundle\Entity\OuterExtension\HasChannelDescriptions;

    /**
     * @var ArrayCollection
     */
    private $packagings;

    public function initPackagings()
    {
        $this->packagings = new ArrayCollection();
    }

    /**
     * @param ProductOptionValue $packaging
     * @return self
     */
    public function addPackaging(ProductOptionValue $packaging)
    {
        $this->packagings->add($packaging);

//        $this->setOwningSideRelation($packaging);

        return $this;
    }

    /**
     * @param ProductOptionValue $packaging
     * @return self
     */
    public function removePackaging(ProductOptionValue $packaging)
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
}