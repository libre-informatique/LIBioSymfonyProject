<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension\LibrinfoVarietiesBundle;

trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\HasSeedBatches;
    use \Librinfo\MediaBundle\Entity\OuterExtension\HasImages;
    use \Librinfo\ProductBundle\Entity\OuterExtension\HasProducts;
}