<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Entity;

use Sylius\Component\Core\Model\Channel as BaseChannel;
use Blast\OuterExtensionBundle\Entity\Traits\OuterExtensible;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
class Channel extends BaseChannel
{
    use OuterExtensible;
    use \AppBundle\Entity\OuterExtension\ChannelExtension;
}