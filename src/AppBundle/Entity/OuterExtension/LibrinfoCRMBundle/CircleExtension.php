<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension\LibrinfoCRMBundle;

use \Librinfo\SonataSyliusUserBundle\Entity\Traits\Traceable;
use Librinfo\SonataSyliusUserBundle\Entity\Traits\Ownable;
use Librinfo\SonataSyliusUserBundle\Entity\OuterExtension\HasUsers;

trait CircleExtension
{
    use Traceable,
        Ownable,
        HasUsers;

    /**
     * @param UserInterface $user
     * @return boolean
     */
    public function isAccessibleBy(UserInterface $user)
    {
        // no owner and no users : everybody has access to the circle
        if ( !$this->getOwner() && $this->getUsers()->isEmpty() )
            return true;

        // current user is the circle owner
        if ( $this->getOwner() && $user->getId() === $this->getOwner()->getId() )
            return true;

        // current user belongs to the circle users
        foreach ( $this->getUsers() as $u)
        if ( $user->getId() === $u->getId() )
            return true;

        return false;
    }
}