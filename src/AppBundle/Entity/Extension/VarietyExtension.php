<?php

namespace AppBundle\Entity\Extension;

trait VarietyExtension
{
    use \Librinfo\SeedBatchBundle\Entity\Traits\Inverse\HasSeedBatches;
    use \Librinfo\MediaBundle\Entity\Traits\HasImages;
    use \AppBundle\Entity\Traits\Inverse\HasPackagings;
}