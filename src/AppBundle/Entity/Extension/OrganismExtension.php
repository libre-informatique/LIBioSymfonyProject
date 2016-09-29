<?php

namespace AppBundle\Entity\Extension;

trait OrganismExtension
{
    use \Librinfo\EmailCRMBundle\Entity\Traits\HasEmailMessages;
    use \Librinfo\SeedBatchBundle\Entity\Traits\Inverse\HasSeedBatches;
    use \Librinfo\SeedBatchBundle\Entity\Traits\Inverse\HasPlots;
}