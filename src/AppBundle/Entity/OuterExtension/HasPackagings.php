<?php

namespace AppBundle\Entity\OuterExtension;

use Doctrine\Common\Collections\ArrayCollection;

trait HasPackagings {
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
     * @return self
     */
    public function setPackagings(ArrayCollection $packagings)
    {
        $this->packagings = $packagings;
        return $this;
    }
}
