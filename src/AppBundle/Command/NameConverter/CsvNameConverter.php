<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Command\NameConverter;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class CsvNameConverter implements NameConverterInterface
{
    /**
     * @var array
     */
    private $names;

    /**
     * @param string $entityClass  entity class FQDN
     */
    public function __construct($entityClass)
    {
        $this->configureNames($entityClass);
    }

    /**
     * This is not used
     */
    public function normalize($propertyName)
    {
        return $propertyName;
    }

    public function denormalize($propertyName)
    {
        return isset($this->names[$propertyName]) ? $this->names[$propertyName] : $propertyName;
    }

    /**
     * @param string $entityClass   entity class FQDN
     * @todo This should be done in a Yaml configuration file
     */
    private function configureNames($entityClass)
    {
        $names = [
            "Librinfo\VarietiesBundle\Entity\Family" => [
                'nom' => 'name',
                'alias' => 'alias',
                'nom latin' => 'latin_name',
                'description' => 'description',
            ],
            "Librinfo\VarietiesBundle\Entity\Genus" => [
                'nom' => 'name',
                'alias' => 'alias',
                'nom latin' => 'latin_name',
                'description' => 'description',
                'famille' => 'family',
            ],
            "Librinfo\VarietiesBundle\Entity\Species" => [
                'nom' => 'name',
                'alias' => 'alias',
                'nom latin' => 'latin_name',
                'description' => 'description',
                'genre' => 'genus',
                'sous-espèce de' => 'parent_species',
                'taux germination légal' => 'legal_germination_rate',
                'PMG' => 'tkw',
                'durée de levée' => 'raise_duration',
                'cycle végétatif' => 'life_cycle',
                'statut réglementaire' => 'regulatory_status',
            ],
            "Librinfo\VarietiesBundle\Entity\Variety" => [
                'nom' => 'name',
                'alias' => 'alias',
                'nom latin' => 'latin_name',
                'description' => 'description',
                'espèce' => 'species',
                'taux germination légal' => 'legal_germination_rate',
                'taux germination AS' => 'germination_rate',
                'PMG' => 'tkw',
                'durée vie' => 'seed_lifespan',
                'durée de levée' => 'raise_duration',
                'maladies transmises' => 'transmitted_diseases',
                'cycle végétatif' => 'life_cycle',
                'statut réglementaire' => 'regulatory_status',
                'inscrit CO' => 'official',
                'nom CO' => 'official_name',
                'date inscription CO' => 'official_date_in',
                'date radiation CO' => 'official_date_out',
                'mainteneur' => 'official_maintainer',
            ],
        ];
        if (!key_exists($entityClass, $names))
            throw new \Exception('CsvNameConverter cannot handle this entity class: '.$entityClass);
        $this->names = $names[$entityClass];
    }

}