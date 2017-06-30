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

namespace AppBundle\Entity;

use Blast\OuterExtensionBundle\Entity\Traits\OuterExtensible;
use Blast\BaseEntitiesBundle\Entity\Traits\BaseEntity;
use AppBundle\Entity\OuterExtension\ChannelDescriptionExtension;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
class ChannelDescription
{
    use BaseEntity, OuterExtensible, ChannelDescriptionExtension;

    /**
     * @var string
     */
    private $value;

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return ChannelDescription
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
