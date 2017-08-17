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

namespace AppBundle\Form\EventListener;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Librinfo\CRMBundle\Entity\Organism;

class CustomerRegistrationFormListener
{
    /**
     * @var RepositoryInterface
     */
    private $customerRepository;

    /**
     * @param RepositoryInterface $customerRepository
     */
    public function __construct(RepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function onPostRegister(GenericEvent $event)
    {
        $organism = $event->getSubject();

        if (!$organism instanceof Organism) {
            throw new UnexpectedTypeException($organism, Organism::class);
        }

        $organism->setIsIndividual(true);
        $organism->setIsCustomer(true);
    }
}
