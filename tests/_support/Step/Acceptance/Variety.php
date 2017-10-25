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

namespace Step\Acceptance;

class Variety extends \WebGuy
{
    public function fullCreate()
    {
        /* todo: maybe add this variable as class attribut */
        $selGenus = $this->createGenus();
        $selPlantCat = $this->createPlantCategory();
        $selSpecies = $this->createSpecies($selGenus, $selPlantCat);
        $selVariety = $this->create($selSpecies, $selPlantCat);

        return $selVariety;
    }

    public function create($speciesName, $plantCatName)
    {
        $varietyName = $this->getRandName() . '-variety';
        $this->wantTo('Create Variety ' . $varietyName);
        $this->amOnPage('/lisem/librinfo/variety/create');
        $this->fillField("//input[contains(@id,'name')]", $varietyName);
        $this->fillField("//input[contains(@id,'latin_name')]", 'latium-' . $varietyName);
        $this->selectDrop('_species', $speciesName);
        $this->selectDrop('_plant_categories', $plantCatName, 'ul');
        $this->click("//a[contains(@id, 'plant_type_add_choice')]/i");
        $this->fillField("//div[contains(@id,'popover')]/div[2]/div/form/div/div/div/input", $this->getRandName() . '-plant');
        $this->click("//div[contains(@id,'popover')]/div[2]/div/form/div/div/div[2]/button");
        $this->generateCode();
        $this->clickCreate();

        return $varietyName;
    }

    public function createSpecies($genusName, $plantCatName)
    {
        $speciesName = $this->getRandName() . '-species-name';
        $this->wantTo('Create Species ' . $speciesName);
        $this->amOnPage('/lisem/librinfo/varieties/species/create');
        $this->fillField("//input[contains(@id,'name')]", $speciesName);

        $this->selectDrop('_genus', $genusName);
        $this->fillField("//input[contains(@id,'latin_name')]", 'latium-' . $speciesName);
        $this->selectDrop('_plant_categories', $plantCatName, 'ul');

        //$this->scrollTo("//input[contains(@id,'latin_name')]");
        //$this->wait(10);
        //$this->scrollTo("//input[contains(@id,'seed_lifespan')]");
        //$this->wait(10);

        $this->generateCode();
        $this->clickCreate();
        // $this->clickCreate('btn_create_and_edit');
        return $speciesName;
    }

    /**
     * @depends Lisem:loginLisem
     */
    public function createGenus()
    {
        $genusName = $this->getRandName() . '-genus';
        $this->wantTo('Create Genus ' . $genusName);
        $this->amOnPage('/lisem/librinfo/varieties/genus/create');
        $this->fillField("//input[contains(@id,'name')]", $genusName);
        $this->fillField("//textarea[contains(@id,'description')]", $genusName . '-desc');
        $this->clickCreate();

        return $genusName;
    }

    public function createPlantCategory()
    {
        $plantCatName = $this->getRandName() . '-plant-cat';
        $this->wantTo('Create Plant Category ' . $plantCatName);
        $this->amOnPage('/lisem/librinfo/varieties/plantcategory/create');

        $this->fillField("//input[contains(@id,'name')]", $plantCatName);
        $this->fillField("//input[contains(@id,'code')]", $this->getRandNbr());
        $this->clickCreate();

        return $plantCatName;
    }
}
