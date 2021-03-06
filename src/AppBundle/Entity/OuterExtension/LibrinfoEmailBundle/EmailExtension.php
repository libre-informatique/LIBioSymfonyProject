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

namespace AppBundle\Entity\OuterExtension\LibrinfoEmailBundle;

trait EmailExtension
{
    use \Librinfo\SonataSyliusUserBundle\Entity\Traits\Traceable;
    use \Librinfo\EmailCRMBundle\Entity\OuterExtension\LibrinfoEmailBundle\EmailExtension;
    use \Librinfo\CRMBundle\Entity\OuterExtension\HasOrganisms;
    use \Librinfo\CRMBundle\Entity\OuterExtension\HasPositions;
    use \Librinfo\CRMBundle\Entity\OuterExtension\HasCircles;
}
