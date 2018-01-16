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

namespace SeedBatchBundle\Entity\Association;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Blast\Bundle\CoreBundle\Doctrine\ORM\OwningSideRelationHandlerTrait;

trait HasSeedBatchesTrait
{
    use OwningSideRelationHandlerTrait;

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

        if (!$this->seedBatches->contains($seedBatch)) {
            $this->seedBatches->add($seedBatch);
            $this->updateRelation($seedBatch, 'add');
        }

        return $this;
    }

    /**
     * @param SeedBatch $seedBatch
     */
    public function removeSeedBatch($seedBatch)
    {
        $this->initSeedBatches();

        if ($this->seedBatches->contains($seedBatch)) {
            $this->seedBatches->removeElement($seedBatch);
            $this->updateRelation($seedBatch, 'remove');
        }
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
     * Get seedBatches.
     */
    public function setSeedBatches($seedBatches)
    {
        $this->initSeedBatches();
        foreach ($seedBatches as $seedBatch) {
            $this->seedBatches->add($seedBatch);
            $this->updateRelation($seedBatch, 'add');
        }
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
