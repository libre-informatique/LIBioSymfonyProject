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

namespace LisemBundle\Entity\SilCRMBundle;

use SeedBatchBundle\Entity\Association\HasPlotsTrait;
use SeedBatchBundle\Entity\Association\HasSeedBatchesTrait;
use PlatformBundle\Entity\SilCRMBundle\Organism as PlatformOrganism;
use Doctrine\Common\Collections\ArrayCollection;

class Organism extends PlatformOrganism
{
    use HasPlotsTrait,
        HasSeedBatchesTrait;

    /**
     * @var string
     */
    protected $seedProducerCode;

    /**
     * @var bool
     */
    protected $seedProducer = false;

    public function __construct()
    {
        parent::__construct();

        $this->plots = new ArrayCollection();
        $this->seedBatches = new ArrayCollection();
    }

    /**
     * @param string $seedProducerCode
     *
     * @return Organism
     */
    public function setSeedProducerCode($seedProducerCode)
    {
        $this->seedProducerCode = $seedProducerCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeedProducerCode()
    {
        return $this->seedProducerCode;
    }

    public function producerToString()
    {
        return (string) $this;
    }

    public function isSeedProducer()
    {
        return (bool) $this->seedProducer;
    }

    public function setSeedProducer($seedProducer)
    {
        $this->seedProducer = $seedProducer;

        return $this;
    }
}
