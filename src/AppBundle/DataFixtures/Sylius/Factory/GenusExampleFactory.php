<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\Sylius\Factory;

use Doctrine\ORM\EntityManager;
use Librinfo\VarietiesBundle\Entity\Genus;
use Librinfo\VarietiesBundle\Entity\Family;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class GenusExampleFactory extends ExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param Repository $userRepository
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $familyRepository = $entityManager->getRepository('LibrinfoVarietiesBundle:Family');

        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefault('name', '')

                ->setDefined('family')
                ->setAllowedTypes('family', ['string', Family::class])
                ->setNormalizer('family', $this->findOneBy($familyRepository, 'name'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);
        $genus = new Genus();
        $genus->setName($options['name']);
        $genus->setFamily($options['family']);
        $this->setCreator($genus);
        return $genus;
    }

}