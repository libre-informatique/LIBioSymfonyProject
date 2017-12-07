<?php

/*
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace LisemBundle\DataFixtures\Sylius\Factory;

use Doctrine\ORM\EntityManager;
use VarietyBundle\Entity\GenusInterface;
use VarietyBundle\Entity\SpeciesInterface;
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

    /**
     * @var string
     */
    protected $entityClass;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $genusRepository = $entityManager->getRepository(GenusInterface::class);
        $speciesRepository = $entityManager->getRepository(SpeciesInterface::class);

        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefined('name')

                ->setDefault('latin_name', '')

                ->setDefault('alias', '')

                ->setDefined('code')

                ->setDefined('genus')
                ->setAllowedTypes('genus', ['string', GenusInterface::class])
                ->setNormalizer('genus', $this->findOneBy($genusRepository, 'name'))

                ->setDefault('parent_species', null)
                ->setAllowedTypes('parent_species', ['null', 'string', SpeciesInterface::class])
                ->setNormalizer('parent_species', $this->findOneBy($speciesRepository, 'name'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);
        $species = (new \ReflectionClass($this->entityClass))->newInstance();
        $species->setName($options['name']);
        $species->setLatinName($options['latin_name']);
        $species->setAlias($options['alias']);
        $species->setCode($options['code']);
        $species->setGenus($options['genus']);
        $species->setParentSpecies($options['parent_species']);
        $this->setCreator($species);

        return $species;
    }

    /**
     * @param string $entityClass
     */
    public function setEntityClass(string $entityClass): void
    {
        $this->entityClass = $entityClass;
    }
}
