<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Entity\OuterExtension;

use AppBundle\Entity\Channel;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
trait HasChannel
{
    /**
     * @var Channel
     */
    private $channel;

    /**
     * Add channel
     *
     * @param Channel $channel
     *
     * @return Variety
     */
    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

}