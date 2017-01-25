<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension\LibrinfoVarietiesBundle;

/**
 * @author Romain SANCHEZ <romain.sanchez@libre-informatique.fr>
 */
trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\HasSeedBatches;
    use \Librinfo\MediaBundle\Entity\OuterExtension\HasImages;
    use \Librinfo\EcommerceBundle\Entity\OuterExtension\HasProducts;
    use \Librinfo\UserBundle\Entity\Traits\Traceable;
    use \AppBundle\Entity\OuterExtension\HasChannelDescriptions;
}