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

namespace AppBundle\DataFixtures\Sylius\Factory;

use Doctrine\ORM\EntityManager;
use Librinfo\VarietiesBundle\Entity\Genus;
use Librinfo\VarietiesBundle\Entity\Species;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class SpeciesExampleFactory extends ExampleFactory implements ExampleFactoryInterface
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
        $genusRepository = $entityManager->getRepository('LibrinfoVarietiesBundle:Genus');
        $speciesRepository = $entityManager->getRepository('LibrinfoVarietiesBundle:Species');

        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefined('name')

                ->setDefault('latin_name', '')

                ->setDefault('alias', '')

                ->setDefined('code')

                ->setDefined('genus')
                ->setAllowedTypes('genus', ['string', Genus::class])
                ->setNormalizer('genus', $this->findOneBy($genusRepository, 'name'))

                ->setDefault('parent_species', null)
                ->setAllowedTypes('parent_species', ['null', 'string', Species::class])
                ->setNormalizer('parent_species', $this->findOneBy($speciesRepository, 'name'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);
        $species = new Species();
        $species->setName($options['name']);
        $species->setLatinName($options['latin_name']);
        $species->setAlias($options['alias']);
        $species->setCode($options['code']);
        $species->setGenus($options['genus']);
        $species->setParentSpecies($options['parent_species']);
        $this->setCreator($species);

        return $species;
    }
}
