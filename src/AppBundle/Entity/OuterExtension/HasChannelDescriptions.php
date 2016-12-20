<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension;

use AppBundle\Entity\ChannelDescription;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
trait HasChannelDescriptions
{
    /**
     * @var ChannelDescription
     */
    private $channelDescriptions;

    /**
     * Add channelDescription
     *
     * @param ChannelDescription $channelDescription
     *
     * @return Variety
     */
    public function addChannelDescription(ChannelDescription $channelDescription)
    {
        $this->channelDescriptions[] = $channelDescription;

        return $this;
    }

    /**
     * Remove channelDescription
     *
     * @param ChannelDescription $channelDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeChannelDescription(ChannelDescription $channelDescription)
    {
        return $this->channelDescriptions->removeElement($channelDescription);
    }

    /**
     * Get channelDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChannelDescriptions()
    {
        return $this->channelDescriptions;
    }
    
    protected function initChannelDescriptions()
    {
        $this->channelDescriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

}