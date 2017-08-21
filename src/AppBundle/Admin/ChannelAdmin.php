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

namespace AppBundle\Admin;

use Librinfo\EcommerceBundle\Admin\ChannelAdmin as BaseChannelAdmin;

class ChannelAdmin extends BaseChannelAdmin
{
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];

        return $query;
    }

    public function toString($object)
    {
        return $object->getCode() ?: $object->getId();
    }
}
