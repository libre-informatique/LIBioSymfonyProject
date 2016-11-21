<?php

namespace AppBundle\Entity\OuterExtension\LibrinfoVarietiesBundle;

trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\Inverse\HasSeedBatches;
    use \Librinfo\MediaBundle\Entity\OuterExtension\HasImages;
    use \AppBundle\Entity\OuterExtension\Inverse\HasPackagings;
}