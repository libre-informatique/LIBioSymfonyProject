<?php

/*
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SeedBatchBundle\Entity\Association;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

trait HasSeedBatchesTrait
{
    /**
     * @var Collection
     */
    protected $seedBatches;

    /**
     * Add seed batch.
     *
     * @param SeedBatch $seedBatch
     *
     * @return self
     */
    public function addSeedBatch($seedBatch)
    {
        $this->initSeedBatches();

        $this->seedBatches->add($seedBatch);

        if (method_exists(get_class($this), 'setProducer')) {
            $seedBatch->setProducer($this);
        }

        return $this;
    }

    /**
     * Remove seed batch.
     *
     * @param SeedBatch $seedBatch
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeSeedBatch($seedBatch)
    {
        $this->initSeedBatches();

        return $this->seedBatches->removeElement($seedBatch);
    }

    /**
     * Get seedBatches.
     *
     * @return Collection
     */
    public function getSeedBatches()
    {
        $this->initSeedBatches();

        return $this->seedBatches;
    }

    /**
     * initSeedBatches collection.
     */
    private function initSeedBatches(): void
    {
        if ($this->seedBatches === null) {
            $this->seedBatches = new ArrayCollection();
        }
    }
}
