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
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Nameable;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use LisemBundle\Entity\ChannelDescription;
use SeedBatchBundle\Entity\Association\HasSeedBatchesTrait;
use Sil\Bundle\EcommerceBundle\Entity\Association\HasProductsTrait;
use Sil\Bundle\EcommerceBundle\Entity\ProductOption;
use Sil\Bundle\MediaBundle\Entity\File;
use Sil\Bundle\SonataSyliusUserBundle\Entity\Traits\Traceable;

/**
 * Variety.
 */
class Variety implements VarietyInterface
{
    use Nameable {
        getName as getNameTrait;
    }

    use BaseEntity,
        Timestampable,
        Descriptible,
        Traceable,
        HasSeedBatchesTrait,
        HasProductsTrait
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
     * @var bool
     */
    protected $official;

    /**
     * @var string
     */
    protected $official_name;

    /**
     * @var \DateTime
     */
    protected $official_date_in;

    /**
     * @var \DateTime
     */
    protected $official_date_out;

    /**
     * @var string
     */
    protected $official_maintainer;

    /**
     * @var int
     */
    protected $legal_germination_rate;

    /**
     * @var string
     */
    protected $regulatory_status;

    /**
     * @var int
     */
    protected $germination_rate;

    /**
     * @var string
     */
    protected $selection_advice;

    /**
     * @var string
     */
    protected $selection_criteria;

    /**
     * @var string
     */
    protected $misc_advice;

    /**
     * @var float
     */
    protected $tkw;

    /**
     * @var int
     */
    protected $seed_lifespan;

    /**
     * @var int
     */
    protected $raise_duration;

    /**
     * @var int
     */
    protected $seedhead_yield;

    /**
     * @var int
     */
    protected $distance_on_line;

    /**
     * @var int
     */
    protected $distance_between_lines;

    /**
     * @var int
     */
    protected $plant_density;

    /**
     * @var int
     */
    protected $area_per_kg;

    /**
     * @var int
     */
    protected $seedheads_per_kg;

    /**
     * @var int
     */
    protected $base_seed_per_kg;

    /**
     * @var string
     */
    protected $transmitted_diseases;

    /**
     * @var string
     */
    protected $strain_characteristics;

    /**
     * @var bool
     */
    protected $isStrain;

    /**
     * @var Collection
     */
    protected $children;

    /**
     * @var VarietyInterface
     */
    protected $parent;

    /**
     * @var SpeciesInterface
     */
    protected $species;

    /**
     * @var Collection
     */
    protected $plant_categories;

    /**
     * @var Collection
     */
    protected $professional_descriptions;

    /**
     * @var Collection
     */
    protected $amateur_descriptions;

    /**
     * @var Collection
     */
    protected $production_descriptions;

    /**
     * @var Collection
     */
    protected $commercial_descriptions;

    /**
     * @var Collection
     */
    protected $plant_descriptions;

    /**
     * @var Collection
     */
    protected $culture_descriptions;

    /**
     * @var Collection
     */
    protected $inner_descriptions;

    /**
     * @var Collection
     */
    protected $images;

    /**
     * @var string
     */
    protected $plant_type;

    /**
     * @var Collection|ChannelDescription[]
     */
    protected $channelDescriptions;

    /**
     * @var Collection|ProductOption[]
     */
    protected $packagings;

    public function initCollections()
    {
        $this->children = new ArrayCollection();
        $this->plant_categories = new ArrayCollection();
        $this->professional_descriptions = new ArrayCollection();
        $this->amateur_descriptions = new ArrayCollection();
        $this->production_descriptions = new ArrayCollection();
        $this->commercial_descriptions = new ArrayCollection();
        $this->plant_descriptions = new ArrayCollection();
        $this->culture_descriptions = new ArrayCollection();
        $this->inner_descriptions = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->channelDescriptions = new ArrayCollection();
        $this->packagings = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->seedBatches = new ArrayCollection();
    }

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initCollections();
    }

    // implementation of __clone for duplication
    public function __clone()
    {
        $this->id = null;
        $this->code = null;
        $this->initCollections();
    }

    //Enable direct access to the value of a specific VarietyDescription
    public function __call($name, $unusedArg)
    {
        $name = explode('||', $name);
        $getter = 'get' . ucfirst($name[0]) . '_descriptions';

        foreach ($this->$getter() as $desc) {
            if ($desc->getField() == $name[1]) {
                return $desc->getValue();
            }
        }
    }

    public function getName()
    {
        if ($this->hasParent() && null == $this->name) {
            return $this->getParent()->getName();
        }

        return $this->getNameTrait();
    }

    public function hasParent()
    {
        return null != $this->getParent();
    }

    public function getSeveralStrains()
    {
        return count($this->children) >= 1;
    }

    /**
     * Set latinName.
     *
     * @param string $latinName
     *
     * @return Variety
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
        if ($this->hasParent() && !$this->latin_name) {
            return $this->getParent()->getLatinName();
        }

        return $this->latin_name;
    }

    /**
     * Set isStrain.
     *
     * @param string $isStrain
     *
     * @return Variety
     */
    public function setIsStrain($isStrain)
    {
        $this->isStrain = $isStrain;

        return $this;
    }

    /**
     * Get isStrain.
     *
     * @return string
     */
    public function getIsStrain()
    {
        return $this->isStrain;
    }

    /**
     * Set alias.
     *
     * @param string $alias
     *
     * @return Variety
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
        if ($this->hasParent() && !$this->alias) {
            return $this->getParent()->getAlias();
        }

        return $this->alias;
    }

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return Variety
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
     * @return Variety
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
        if ($this->hasParent() && !$this->life_cycle) {
            return $this->getParent()->getLifeCycle();
        }

        if (!$this->life_cycle && $this->getSpecies()) {
            return $this->getSpecies()->getLifeCycle();
        }

        return $this->life_cycle;
    }

    /**
     * Set official.
     *
     * @param bool $official
     *
     * @return Variety
     */
    public function setOfficial($official)
    {
        $this->official = $official;

        return $this;
    }

    /**
     * Get official.
     *
     * @return bool
     */
    public function getOfficial()
    {
        return $this->official;
    }

    /**
     * Set officialName.
     *
     * @param string $officialName
     *
     * @return Variety
     */
    public function setOfficialName($officialName)
    {
        $this->official_name = $officialName;

        return $this;
    }

    /**
     * Get officialName.
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->official_name;
    }

    /**
     * Set officialDateIn.
     *
     * @param \DateTime $officialDateIn
     *
     * @return Variety
     */
    public function setOfficialDateIn($officialDateIn)
    {
        $this->official_date_in = $officialDateIn;

        return $this;
    }

    /**
     * Get officialDateIn.
     *
     * @return \DateTime
     */
    public function getOfficialDateIn()
    {
        return $this->official_date_in;
    }

    /**
     * Set officialDateOut.
     *
     * @param \DateTime $officialDateOut
     *
     * @return Variety
     */
    public function setOfficialDateOut($officialDateOut)
    {
        $this->official_date_out = $officialDateOut;

        return $this;
    }

    /**
     * Get officialDateOut.
     *
     * @return \DateTime
     */
    public function getOfficialDateOut()
    {
        return $this->official_date_out;
    }

    /**
     * Set officialMaintainer.
     *
     * @param string $officialMaintainer
     *
     * @return Variety
     */
    public function setOfficialMaintainer($officialMaintainer)
    {
        $this->official_maintainer = $officialMaintainer;

        return $this;
    }

    /**
     * Get officialMaintainer.
     *
     * @return string
     */
    public function getOfficialMaintainer()
    {
        return $this->official_maintainer;
    }

    /**
     * Set legalGerminationRate.
     *
     * @param int $legalGerminationRate
     *
     * @return Variety
     */
    public function setLegalGerminationRate($legalGerminationRate)
    {
        $this->legal_germination_rate = $legalGerminationRate;

        return $this;
    }

    /**
     * Get legalGerminationRate.
     *
     * @return int
     */
    public function getLegalGerminationRate()
    {
        if (!$this->legal_germination_rate && $this->getSpecies()) {
            return $this->getSpecies()->getLegalGerminationRate();
        }

        return $this->legal_germination_rate;
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
     * Set germinationRate.
     *
     * @param int $germinationRate
     *
     * @return Variety
     */
    public function setGerminationRate($germinationRate)
    {
        $this->germination_rate = $germinationRate;

        return $this;
    }

    /**
     * Get germinationRate.
     *
     * @return int
     */
    public function getGerminationRate()
    {
        return $this->germination_rate;
    }

    /**
     * Set parent.
     *
     * @param Variety $parent
     *
     * @return Variety
     */
    public function setParent(Variety $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return VarietyInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child.
     *
     * @param Variety $child
     *
     * @return Variety
     */
    public function addChild(Variety $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child.
     *
     * @param Variety $child
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeChild(Variety $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * Get children.
     *
     * @return Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set species.
     *
     * @param Species $species
     *
     * @return Variety
     */
    public function setSpecies(Species $species = null)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get species.
     *
     * @return SpeciesInterface
     */
    public function getSpecies()
    {
        if ($this->hasParent() && !$this->species) {
            return $this->getParent()->getSpecies();
        }

        return $this->species;
    }

    /**
     * Add plantCategory.
     *
     * @param PlantCategory $plantCategory
     *
     * @return Variety
     */
    public function addPlantCategory(PlantCategory $plantCategory)
    {
        $this->plant_categories[] = $plantCategory;

        return $this;
    }

    /**
     * Remove plantCategory.
     *
     * @param PlantCategory $plantCategory
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removePlantCategory(PlantCategory $plantCategory)
    {
        return $this->plant_categories->removeElement($plantCategory);
    }

    /**
     * Get plantCategories.
     *
     * @return Collection
     */
    public function getPlantCategories()
    {
        if (!$this->plant_categories && $this->getSpecies()) {
            return $this->getSpecies()->getPlantCategories();
        }

        return $this->plant_categories;
    }

    /**
     * Set plantCategories.
     */
    public function setPlantCategories($plant_categories)
    {
        $this->plant_categories = $plant_categories;
    }

    /**
     * Set selectionAdvice.
     *
     * @param string $selectionAdvice
     *
     * @return Variety
     */
    public function setSelectionAdvice($selectionAdvice)
    {
        $this->selection_advice = $selectionAdvice;

        return $this;
    }

    /**
     * Get selectionAdvice.
     *
     * @return string
     */
    public function getSelectionAdvice()
    {
        return $this->selection_advice;
    }

    /**
     * Set selectionCriteria.
     *
     * @param string $selectionCriteria
     *
     * @return Variety
     */
    public function setSelectionCriteria($selectionCriteria)
    {
        $this->selection_criteria = $selectionCriteria;

        return $this;
    }

    /**
     * Get selectionCriteria.
     *
     * @return string
     */
    public function getSelectionCriteria()
    {
        return $this->selection_criteria;
    }

    /**
     * Set miscAdvice.
     *
     * @param string $miscAdvice
     *
     * @return Variety
     */
    public function setMiscAdvice($miscAdvice)
    {
        $this->misc_advice = $miscAdvice;

        return $this;
    }

    /**
     * Get miscAdvice.
     *
     * @return string
     */
    public function getMiscAdvice()
    {
        return $this->misc_advice;
    }

    /**
     * Set tkw.
     *
     * @param float $tkw
     *
     * @return Variety
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
        if (!$this->tkw && $this->getSpecies()) {
            return $this->getSpecies()->getTkw();
        }

        return $this->tkw;
    }

    /**
     * Set seedLifespan.
     *
     * @param int $seedLifespan
     *
     * @return Variety
     */
    public function setSeedLifespan($seedLifespan)
    {
        $this->seed_lifespan = $seedLifespan;

        return $this;
    }

    /**
     * Get seedLifespan.
     *
     * @return int
     */
    public function getSeedLifespan()
    {
        if (!$this->seed_lifespan && $this->getSpecies()) {
            return $this->getSpecies()->getSeedLifeSpan();
        }

        return $this->seed_lifespan;
    }

    /**
     * Set raiseDuration.
     *
     * @param int $raiseDuration
     *
     * @return Variety
     */
    public function setRaiseDuration($raiseDuration)
    {
        $this->raise_duration = $raiseDuration;

        return $this;
    }

    /**
     * Get raiseDuration.
     *
     * @return int
     */
    public function getRaiseDuration()
    {
        if (!$this->raise_duration && $this->getSpecies()) {
            return $this->getSpecies()->getRaiseDuration();
        }

        return $this->raise_duration;
    }

    /**
     * Set seedheadYield.
     *
     * @param int $seedheadYield
     *
     * @return Variety
     */
    public function setSeedheadYield($seedheadYield)
    {
        $this->seedhead_yield = $seedheadYield;

        return $this;
    }

    /**
     * Get seedheadYield.
     *
     * @return int
     */
    public function getSeedheadYield()
    {
        return $this->seedhead_yield;
    }

    /**
     * Set distanceOnLine.
     *
     * @param int $distanceOnLine
     *
     * @return Variety
     */
    public function setDistanceOnLine($distanceOnLine)
    {
        $this->distance_on_line = $distanceOnLine;

        return $this;
    }

    /**
     * Get distanceOnLine.
     *
     * @return int
     */
    public function getDistanceOnLine()
    {
        return $this->distance_on_line;
    }

    /**
     * Set distanceBetweenLines.
     *
     * @param int $distanceBetweenLines
     *
     * @return Variety
     */
    public function setDistanceBetweenLines($distanceBetweenLines)
    {
        $this->distance_between_lines = $distanceBetweenLines;

        return $this;
    }

    /**
     * Get distanceBetweenLines.
     *
     * @return int
     */
    public function getDistanceBetweenLines()
    {
        return $this->distance_between_lines;
    }

    /**
     * Set plantDensity.
     *
     * @param int $plantDensity
     *
     * @return Variety
     */
    public function setPlantDensity($plantDensity)
    {
        $this->plant_density = $plantDensity;

        return $this;
    }

    /**
     * Get plantDensity.
     *
     * @return int
     */
    public function getPlantDensity()
    {
        return $this->plant_density;
    }

    /**
     * Set areaPerKg.
     *
     * @param int $areaPerKg
     *
     * @return Variety
     */
    public function setAreaPerKg($areaPerKg)
    {
        $this->area_per_kg = $areaPerKg;

        return $this;
    }

    /**
     * Get areaPerKg.
     *
     * @return int
     */
    public function getAreaPerKg()
    {
        return $this->area_per_kg;
    }

    /**
     * Set seedheadsPerKg.
     *
     * @param int $seedheadsPerKg
     *
     * @return Variety
     */
    public function setSeedheadsPerKg($seedheadsPerKg)
    {
        $this->seedheads_per_kg = $seedheadsPerKg;

        return $this;
    }

    /**
     * Get seedheadsPerKg.
     *
     * @return int
     */
    public function getSeedheadsPerKg()
    {
        return $this->seedheads_per_kg;
    }

    /**
     * Set baseSeedPerKg.
     *
     * @param int $baseSeedPerKg
     *
     * @return Variety
     */
    public function setBaseSeedPerKg($baseSeedPerKg)
    {
        $this->base_seed_per_kg = $baseSeedPerKg;

        return $this;
    }

    /**
     * Get baseSeedPerKg.
     *
     * @return int
     */
    public function getBaseSeedPerKg()
    {
        return $this->base_seed_per_kg;
    }

    /**
     * Set transmittedDiseases.
     *
     * @param \strin $transmittedDiseases
     *
     * @return Variety
     */
    public function setTransmittedDiseases($transmittedDiseases)
    {
        $this->transmitted_diseases = $transmittedDiseases;

        return $this;
    }

    /**
     * Get transmittedDiseases.
     *
     * @return \strin
     */
    public function getTransmittedDiseases()
    {
        return $this->transmitted_diseases;
    }

    /**
     * Set strainCharacteristics.
     *
     * @param string $strainCharacteristics
     *
     * @return Strain
     */
    public function setStrainCharacteristics($strainCharacteristics)
    {
        $this->strain_characteristics = $strainCharacteristics;

        return $this;
    }

    /**
     * Get strainCharacteristics.
     *
     * @return string
     */
    public function getStrainCharacteristics()
    {
        return $this->strain_characteristics;
    }

    /**
     * Set variety.
     *
     * @param Variety $variety
     *
     * @return Strain
     */
    public function setVariety(Variety $variety = null)
    {
        $this->variety = $variety;

        return $this;
    }

    /**
     * Get variety.
     *
     * @return VarietyInterface
     */
    public function getVariety()
    {
        return $this->variety;
    }

    /**
     * Add professionalDescription.
     *
     * @param VarietyDescriptionProfessional $professionalDescription
     *
     * @return Variety
     */
    public function addProfessionalDescription(VarietyDescriptionProfessional $professionalDescription)
    {
        $this->professional_descriptions[] = $professionalDescription;

        return $this;
    }

    /**
     * Remove professionalDescription.
     *
     * @param VarietyDescriptionProfessional $professionalDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeProfessionalDescription(VarietyDescriptionProfessional $professionalDescription)
    {
        return $this->professional_descriptions->removeElement($professionalDescription);
    }

    /**
     * Get professionalDescriptions.
     *
     * @return Collection
     */
    public function getProfessionalDescriptions()
    {
        return $this->professional_descriptions;
    }

    /**
     * alias for getProfessionalDescriptions().
     *
     * @return Collection
     */
    public function getProfessional_descriptions()
    {
        return $this->getProfessionalDescriptions();
    }

    /**
     * Set professional descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setProfessionalDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->professional_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add amateurDescription.
     *
     * @param VarietyDescriptionAmateur amateurDescription
     *
     * @return Variety
     */
    public function addAmateurDescription(VarietyDescriptionAmateur $amateurDescription)
    {
        $this->amateur_descriptions[] = $amateurDescription;

        return $this;
    }

    /**
     * Remove amateurDescription.
     *
     * @param VarietyDescriptionAmateur $amateurDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeAmateurDescription(VarietyDescriptionAmateur $amateurDescription)
    {
        return $this->amateur_descriptions->removeElement($amateurDescription);
    }

    /**
     * Get amateurDescriptions.
     *
     * @return Collection
     */
    public function getAmateurDescriptions()
    {
        return $this->amateur_descriptions;
    }

    /**
     * alias for getAmateurDescriptions().
     *
     * @return Collection
     */
    public function getAmateur_descriptions()
    {
        return $this->getAmateurDescriptions();
    }

    /**
     * Set amateur descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setAmateurDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->amateur_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add productionDescription.
     *
     * @param VarietyDescriptionProduction $productionDescription
     *
     * @return Variety
     */
    public function addProductionDescription(VarietyDescriptionProduction $productionDescription)
    {
        $this->production_descriptions[] = $productionDescription;

        return $this;
    }

    /**
     * Remove productionDescription.
     *
     * @param VarietyDescriptionProduction $productionDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeProductionDescription(VarietyDescriptionProduction $productionDescription)
    {
        return $this->production_descriptions->removeElement($productionDescription);
    }

    /**
     * Get productionDescriptions.
     *
     * @return Collection
     */
    public function getProductionDescriptions()
    {
        return $this->production_descriptions;
    }

    /**
     * alias for getProductionDescriptions().
     *
     * @return Collection
     */
    public function getProduction_descriptions()
    {
        return $this->getProductionDescriptions();
    }

    /**
     * Set production descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setProductionDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->production_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add commercialDescription.
     *
     * @param VarietyDescriptionCommercial $commercialDescription
     *
     * @return Variety
     */
    public function addCommercialDescription(VarietyDescriptionCommercial $commercialDescription)
    {
        $this->commercial_descriptions[] = $commercialDescription;

        return $this;
    }

    /**
     * Remove commercialDescription.
     *
     * @param VarietyDescriptionCommercial $commercialDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeCommercialDescription(VarietyDescriptionCommercial $commercialDescription)
    {
        return $this->commercial_descriptions->removeElement($commercialDescription);
    }

    /**
     * Get commercialDescriptions.
     *
     * @return Collection
     */
    public function getCommercialDescriptions()
    {
        return $this->commercial_descriptions;
    }

    /**
     * alias for getCommercialDescriptions().
     *
     * @return Collection
     */
    public function getCommercial_descriptions()
    {
        return $this->getCommercialDescriptions();
    }

    /**
     * Set commercial descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setCommercialDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->commercial_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add plantDescription.
     *
     * @param VarietyDescriptionPlant $plantDescription
     *
     * @return Variety
     */
    public function addPlantDescription(VarietyDescriptionPlant $plantDescription)
    {
        $this->plant_descriptions[] = $plantDescription;

        return $this;
    }

    /**
     * Remove plantDescription.
     *
     * @param VarietyDescriptionPlant $plantDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removePlantDescription(VarietyDescriptionPlant $plantDescription)
    {
        return $this->plant_descriptions->removeElement($plantDescription);
    }

    /**
     * Get plantDescriptions.
     *
     * @return Collection
     */
    public function getPlantDescriptions()
    {
        return $this->plant_descriptions;
    }

    /**
     * alias for getPlantDescriptions().
     *
     * @return Collection
     */
    public function getPlant_descriptions()
    {
        return $this->getPlantDescriptions();
    }

    /**
     * Set plant descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setPlantDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->plant_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add cultureDescription.
     *
     * @param VarietyDescriptionCulture $cultureDescription
     *
     * @return Variety
     */
    public function addCultureDescription(VarietyDescriptionCulture $cultureDescription)
    {
        $this->culture_descriptions[] = $cultureDescription;

        return $this;
    }

    /**
     * Remove cultureDescription.
     *
     * @param VarietyDescriptionCulture $cultureDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeCultureDescription(VarietyDescriptionCulture $cultureDescription)
    {
        return $this->culture_descriptions->removeElement($cultureDescription);
    }

    /**
     * Get cultureDescriptions.
     *
     * @return Collection
     */
    public function getCultureDescriptions()
    {
        return $this->culture_descriptions;
    }

    /**
     * alias for getCultureDescriptions().
     *
     * @return Collection
     */
    public function getCulture_descriptions()
    {
        return $this->getCultureDescriptions();
    }

    /**
     * Set culture descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setCultureDescriptions($descriptions)
    {
        foreach ($descriptions as $description) {
            $description->setVariety($this);
        }
        $this->culture_descriptions = $descriptions;

        return $this;
    }

    /**
     * Add innerDescription.
     *
     * @param VarietyDescriptionInner $innerDescription
     *
     * @return Variety
     */
    public function addInnerDescription(VarietyDescriptionInner $innerDescription)
    {
        $this->inner_descriptions[] = $innerDescription;

        return $this;
    }

    /**
     * Remove innerDescription.
     *
     * @param VarietyDescriptionInner $innerDescription
     *
     * @return bool tRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeInnerDescription(VarietyDescriptionInner $innerDescription)
    {
        return $this->inner_descriptions->removeElement($innerDescription);
    }

    /**
     * Get innerDescriptions.
     *
     * @return Collection
     */
    public function getInnerDescriptions()
    {
        return $this->inner_descriptions;
    }

    /**
     * Set inner descriptions.
     *
     * @param Collection $descriptions
     *
     * @return Variety
     */
    public function setInnerDescriptions($descriptions)
    {
        $this->inner_descriptions = $descriptions;

        return $this;
    }

    /**
     * alias for SilMediaBundle/CRUDController::handleFiles().
     *
     * @param File $file
     *
     * @return Variety
     */
    public function addLibrinfoFile(File $file = null)
    {
        if (!$this->images->contains($file)) {
            $this->images->add($file);
        }

        return $this;
    }

    /**
     * alias for SilMediaBundle/CRUDController::handleFiles().
     *
     * @param File $file
     *
     * @return Variety
     */
    public function removeLibrinfoFile(File $file)
    {
        if ($this->images->contains($file)) {
            $this->images->removeElement($file);
        }

        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages(ArrayCollection $images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlantType()
    {
        return $this->plant_type;
    }

    /**
     * @param string plant_type
     *
     * @return self
     */
    public function setPlantType($plant_type)
    {
        $this->plant_type = $plant_type;

        return $this;
    }

    /**
     * @param ChannelDescription $channelDescription
     */
    public function addChannelDescription(ChannelDescription $channelDescription)
    {
        $this->channelDescriptions->add($channelDescription);
    }

    /**
     * @param ChannelDescription $channelDescription
     */
    public function removeChannelDescription(ChannelDescription $channelDescription)
    {
        $this->channelDescriptions->removeElement($channelDescription);
    }

    /**
     * @return Collection|ChannelDescription[]
     */
    public function getChannelDescriptions()
    {
        return $this->channelDescriptions;
    }

    /**
     * @param ProductOption $packaging
     */
    public function addPackaging(ProductOption $packaging)
    {
        $this->packagings->add($packaging);
    }

    /**
     * @param ProductOption $packaging
     */
    public function removePackaging(ProductOption $packaging)
    {
        $this->packagings->removeElement($packaging);
    }

    /**
     * @return Collection|ProductOption[]
     */
    public function getPackagings()
    {
        return $this->packagings;
    }

    /**
     * @param Collection|ProductOption[]
     */
    public function setPackagings(Collection $packagings)
    {
        $this->packagings = $packagings;
    }
}