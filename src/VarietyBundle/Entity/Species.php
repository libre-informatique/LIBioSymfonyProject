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

namespace VarietyBundle\Entity;

use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\BaseEntity;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Descriptible;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Jsonable;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Nameable;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Sil\Bundle\SonataSyliusUserBundle\Entity\Traits\Traceable;

/**
 * Species.
 */
class Species implements \JsonSerializable, SpeciesInterface
{
    use BaseEntity,
        Nameable,
        Timestampable,
        Descriptible,
        Jsonable,
        Traceable
    ;

    /**
     * @var string
     */
    protected $latin_name;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $life_cycle;

    /**
     * @var int
     */
    protected $legal_germination_rate = 0;

    /**
     * @var int
     */
    protected $germination_rate = 0;

    /**
     * @var int
     */
    protected $seed_lifespan;

    /**
     * @var int
     */
    protected $raise_duration;

    /**
     * @var float
     */
    protected $tkw;

    /**
     * @var string
     */
    protected $regulatory_status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $varieties;

    /**
     * @var \VarietyBundle\Entity\Genus
     */
    protected $genus;

    /**
     * @var \VarietyBundle\Entity\Species
     */
    protected $parent_species;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $subspecieses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $plant_categories;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initCollections();
    }

    public function __clone()
    {
        $this->id = null;
        $this->initCollections();
    }

    public function initCollections()
    {
        $this->varieties = new ArrayCollection();
        $this->subspecieses = new ArrayCollection();
        $this->plant_categories = new ArrayCollection();
    }

    /**
     * Set latinName.
     *
     * @param string $latinName
     *
     * @return Species
     */
    public function setLatinName($latinName)
    {
        $this->latin_name = $latinName;

        return $this;
    }

    /**
     * Get latinName.
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latin_name;
    }

    /**
     * Set alias.
     *
     * @param string $alias
     *
     * @return Species
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return Species
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set lifeCycle.
     *
     * @param string $lifeCycle
     *
     * @return Species
     */
    public function setLifeCycle($lifeCycle)
    {
        $this->life_cycle = $lifeCycle;

        return $this;
    }

    /**
     * Get lifeCycle.
     *
     * @return string
     */
    public function getLifeCycle()
    {
        return $this->life_cycle;
    }

    /**
     * Set legal_germination_rate.
     *
     * @param int $legalGerminationRate
     *
     * @return Species
     */
    public function setLegalGerminationRate($legalGerminationRate)
    {
        $this->legal_germination_rate = $legalGerminationRate;

        return $this;
    }

    /**
     * Get legal_germination_rate.
     *
     * @return int
     */
    public function getLegalGerminationRate()
    {
        return $this->legal_germination_rate;
    }

    /**
     * @return int
     */
    public function getGerminationRate(): int
    {
        return $this->germination_rate;
    }

    /**
     * @param int $germination_rate
     */
    public function setGerminationRate(?int $germination_rate): void
    {
        $this->germination_rate = $germination_rate;
    }

    /**
     * Set seed_lifespan.
     *
     * @param int $seedLifespan
     *
     * @return Species
     */
    public function setSeedLifespan($seedLifespan)
    {
        $this->seed_lifespan = $seedLifespan;

        return $this;
    }

    /**
     * Get seed_lifespan.
     *
     * @return int
     */
    public function getSeedLifespan()
    {
        return $this->seed_lifespan;
    }

    /**
     * Set raise_duration.
     *
     * @param int $raiseDuration
     *
     * @return Species
     */
    public function setRaiseDuration($raiseDuration)
    {
        $this->raise_duration = $raiseDuration;

        return $this;
    }

    /**
     * Get raise_duration.
     *
     * @return int
     */
    public function getRaiseDuration()
    {
        return $this->raise_duration;
    }

    /**
     * Set tkw.
     *
     * @param float $tkw
     *
     * @return Species
     */
    public function setTkw($tkw)
    {
        $this->tkw = $tkw;

        return $this;
    }

    /**
     * Get tkw.
     *
     * @return float
     */
    public function getTkw()
    {
        return $this->tkw;
    }

    /**
     * Set regulatoryStatus.
     *
     * @param string $regulatoryStatus
     *
     * @return Variety
     */
    public function setRegulatoryStatus($regulatoryStatus)
    {
        $this->regulatory_status = $regulatoryStatus;

        return $this;
    }

    /**
     * Get regulatoryStatus.
     *
     * @return string
     */
    public function getRegulatoryStatus()
    {
        return $this->regulatory_status;
    }

    /**
     * Set genus.
     *
     * @param \VarietyBundle\Entity\Genus $genus
     *
     * @return Species
     */
    public function setGenus(\VarietyBundle\Entity\Genus $genus = null)
    {
        $this->genus = $genus;

        return $this;
    }

    /**
     * Get genus.
     *
     * @return \VarietyBundle\Entity\Genus
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * Add variety.
     *
     * @param \VarietyBundle\Entity\Variety $variety
     *
     * @return Species
     */
    public function addVariety(\VarietyBundle\Entity\Variety $variety)
    {
        $variety->setSpecies($this);
        $this->varieties->add($variety);

        return $this;
    }

    /**
     * Remove variety.
     *
     * @param \VarietyBundle\Entity\Variety $variety
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeVariety(\VarietyBundle\Entity\Variety $variety)
    {
        return $this->varieties->removeElement($variety);
    }

    /**
     * Get varieties.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVarieties()
    {
        return $this->varieties;
    }

    /**
     * Add subspecies.
     *
     * @param \VarietyBundle\Entity\Species $subspecies
     *
     * @return Species
     */
    public function addSubspecies(\VarietyBundle\Entity\Species $subspecies)
    {
        $subspecies->setParentSpecies($this);
        $this->subspecieses[] = $subspecies;

        return $this;
    }

    /**
     * Remove subspecies.
     *
     * @param \VarietyBundle\Entity\Species $subspecies
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeSubspeciese(\VarietyBundle\Entity\Species $subspecies)
    {
        return $this->subspecieses->removeElement($subspecies);
    }

    /**
     * Get subspecieses.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubspecieses()
    {
        return $this->subspecieses;
    }

    /**
     * Has sub-specieses.
     *
     * @return bool
     */
    public function hasSubspecieses()
    {
        return count($this->subspecieses) > 0;
    }

    /**
     * Set parentSpecies.
     *
     * @param \VarietyBundle\Entity\Species $parentSpecies
     *
     * @return Species
     */
    public function setParentSpecies(\VarietyBundle\Entity\Species $parentSpecies = null)
    {
        $this->parent_species = $parentSpecies;

        return $this;
    }

    /**
     * Get parentSpecies.
     *
     * @return \VarietyBundle\Entity\Species
     */
    public function getParentSpecies()
    {
        return $this->parent_species;
    }

    /**
     * Has parent species.
     *
     * @return bool
     */
    public function hasParentSpecies()
    {
        return $this->parent_species != null;
    }

    /**
     * Check if a species has a grand parent
     * This should never happen (used for validation methods).
     *
     * @return bool
     */
    public function hasGrandParentSpecies()
    {
        return $this->parent_species != null && $this->parent_species->getParentSpecies() != null;
    }

    /**
     * Add plantCategory.
     *
     * @param \VarietyBundle\Entity\PlantCategory $plantCategory
     *
     * @return Variety
     */
    public function addPlantCategory(\VarietyBundle\Entity\PlantCategory $plantCategory)
    {
        $this->plant_categories[] = $plantCategory;

        return $this;
    }

    /**
     * Remove plantCategory.
     *
     * @param \VarietyBundle\Entity\PlantCategory $plantCategory
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removePlantCategory(\VarietyBundle\Entity\PlantCategory $plantCategory)
    {
        return $this->plant_categories->removeElement($plantCategory);
    }

    /**
     * Get plantCategories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlantCategories()
    {
        return $this->plant_categories;
    }

    /**
     * Set plantCategories.
     */
    public function setPlantCategories($plant_categories)
    {
        $this->plant_categories = $plant_categories;
    }
}
