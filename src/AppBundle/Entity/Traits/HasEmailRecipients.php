<?php

namespace AppBundle\Entity\Traits;

trait HasEmailRecipients
{
    use \Librinfo\CRMBundle\Entity\Traits\HasOrganisms;
    use \Librinfo\CRMBundle\Entity\Traits\HasPositions;
    use \Librinfo\CRMBundle\Entity\Traits\HasContacts;

    /*
    public function initEmailRecipients()
    {
        $rc = new \ReflectionClass($this);
        $traits = $rc->getTraits();
        foreach ( $traits as $trait )
        if ( $trait->hasMethod($fct = 'init'.substr($trait->getName(),3)) )
        {
            $this->$fct();
        }

        $this->initOrganisms();
        $this->initPositions();
        $this->initContacts();
    }
    */
}