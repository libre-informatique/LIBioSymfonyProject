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

namespace AppBundle\Entity\OuterExtension\LibrinfoVarietiesBundle;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\HasSeedBatches;
    use \Librinfo\EcommerceBundle\Entity\OuterExtension\HasProducts;
    use \Librinfo\SonataSyliusUserBundle\Entity\Traits\Traceable;
    use \AppBundle\Entity\OuterExtension\HasChannelDescriptions;
    use \AppBundle\Entity\OuterExtension\HasPackagings;
}
