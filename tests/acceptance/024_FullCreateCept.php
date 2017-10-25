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

// @group scenarii variety

$I = new WebGuy($scenario);

$I->loginLisem();

$selGenus = createVarietyGenus($I);
$selPlantCat =  createVarietyPlantCategory($I);
$selSpecies = createVarietySpecies($I, $selGenus, $selPlantCat);
createVariety($I, $selSpecies, $selPlantCat);

//createSeedBatchProducer($I);

function createVariety(Webguy $I, $speciesName, $plantCatName)
{
    $varietyName =  $I->getRandName() . '-variety';
    $I->wantTo('Create Variety');
    $I->amOnPage('/lisem/librinfo/variety/create');
    $I->fillField("//input[contains(@id,'name')]", $varietyName);
    $I->fillField("//input[contains(@id,'latin_name')]", 'latium-' . $varietyName);
    $I->selectDrop('_species', $speciesName);
    $I->selectDrop('_plant_categories', $plantCatName, 'ul');
    $I->click("//a[contains(@id, 'code_generate_code')]");
    $I->waitForElementNotVisible('.sk-folding-cube', 30);
    $I->click("//a[contains(@id, 'plant_type_add_choice')]/i");
    $I->fillField("//div[contains(@id,'popover')]/div[2]/div/form/div/div/div/input", $I->getRandName() . '-plant');
    $I->click("//div[contains(@id,'popover')]/div[2]/div/form/div/div/div[2]/button");
    $I->clickCreate();
    return $varietyName;
}


// OK
function createVarietySpecies(Webguy $I, $genusName, $plantCatName)
{
    $speciesName = $I->getRandName() . '-species-name';
    
    $I->wantTo('Create Species ' . $speciesName);
    $I->amOnPage('/lisem/librinfo/varieties/species/create');
    $I->fillField("//input[contains(@id,'name')]", $speciesName);
    $I->click("//a[contains(@id, 'code_generate_code')]");
    $I->waitForElementNotVisible('.sk-folding-cube', 30);
    $I->selectDrop('_genus', $genusName);
    $I->fillField("//input[contains(@id,'latin_name')]", 'latium-' . $speciesName);
    $I->selectDrop('_plant_categories', $plantCatName, 'ul');
   
    //$I->scrollTo("//input[contains(@id,'latin_name')]");
    //$I->wait(10);
    //$I->scrollTo("//input[contains(@id,'seed_lifespan')]");
    //$I->wait(10);

    $I->clickCreate();
    // $I->clickCreate('btn_create_and_edit');
    return $speciesName;
}

// OK
function createVarietyGenus(Webguy $I)
{
    $genusName =  $I->getRandName() . '-genus';
    $I->wantTo('Create Genus ' . $genusName);
    $I->amOnPage('/lisem/librinfo/varieties/genus/create');
    $I->fillField("//input[contains(@id,'name')]", $genusName);
    $I->fillField("//textarea[contains(@id,'description')]", $genusName . '-desc');
    $I->clickCreate();
    return $genusName;
}

// OK
function createVarietyPlantCategory(Webguy $I)
{
    $plantCatName = $I->getRandName() . '-plant-cat';
    $I->wantTo('Create Plant Category ' . $plantCatName);
    $I->amOnPage('/lisem/librinfo/varieties/plantcategory/create');
 
    $I->fillField("//input[contains(@id,'name')]", $plantCatName);
    $I->fillField("//input[contains(@id,'code')]", $I->getRandNbr());
    $I->clickCreate();
    return $plantCatName;
}


function createPlot(Webguy $I)
{
    $I->wantTo('createPlot');
    $I->amOnPage('/lisem/librinfo/seedbatch/seed-producer/create');
    $I->fillField("//input[@id='s59edf0d2e9328_name']", $I->getRandName() . '-plot');
    $I->fillField("//input[@id='producer']", $I->getRandName() . '-producer');
    $I->fillField('#s59edf0d2e9328_zip', '29');
    $I->click('Generer le code');
    $I->fillField('#s59edf0d2e9328_city', $I->getRandName() . '-town');
    $I->click('input[name=btn_create_and_edit]');
}

function createSeedBatch(Webguy $I)
{
    $I->wantTo('createSeedBatch');
    $I->amOnPage('lisem/librinfo/seedbatch/seedbatch/create');
}

// OK
function createSeedBatchProducer(Webguy $I)
{
    $I->wantTo('Create a producer');
    $I->amOnPage('/lisem/librinfo/seedbatch/seed-producer/create');

    //$I->click("//li[2]/div/label/div/ins"); //ugly work
    /* @todo: find a way to click without use li[2] ... */
    $I->click("//ul[contains(@id, '_isIndividual')]/li[2]/div/label/div/ins"); //ugly too

    $I->selectDrop('_title', 'M');
    $I->fillField("//input[contains(@id,'_firstname')]", $I->getRandName() . '-producer');
    $I->fillField("//input[contains(@id,'_lastname')]", $I->getRandName() . '-last-producer');
    $I->fillField("//input[contains(@id,'_email')]", $I->getRandName() . '-producer@lisem.eu');
    $I->clickCreate();
}
