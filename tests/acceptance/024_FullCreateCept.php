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

// @group scenarii

$I = new WebGuy($scenario);

$I->loginLisem();

createVarietyGenus($I);
createVarietyPlantCategory($I);
createVarietySpecies($I); //Need Genus and Cat Created before

//createSeedBatchProducer($I);

// OK
function createVarietySpecies(Webguy $I)
{
    $I->wantTo('Create Species');
    $I->amOnPage('/lisem/librinfo/varieties/species/create');
    $I->fillField("//input[contains(@id,'name')]", $I->getRandName() . '-species-name');
    $I->click("//a[contains(@id, 'code_generate_code')]");
    $I->waitForElementNotVisible('.sk-folding-cube', 30);
    $I->selectDrop('_genus', $I->getRandName() . '-genus');
    $I->fillField("//input[contains(@id,'latin_name')]", $I->getRandName() . '-specium');
    $I->selectDrop('plant_categories', $I->getRandName() . '-plant-cat', 'ul');
   
    //$I->scrollTo("//input[contains(@id,'latin_name')]");
    //$I->wait(10);
    //$I->scrollTo("//input[contains(@id,'seed_lifespan')]");
    //$I->wait(10);

    $I->clickCreate();
    // $I->clickCreate('btn_create_and_edit');
}

// OK
function createVarietyGenus(Webguy $I)
{
    $I->wantTo('Create Genus');
    $I->amOnPage('/lisem/librinfo/varieties/genus/create');
    $I->fillField("//input[contains(@id,'name')]", $I->getRandName() . '-genus');
    $I->fillField("//textarea[contains(@id,'description')]", $I->getRandName() . '-genus-desc');
    $I->clickCreate();
    /* @todo : should return genus name to be used for other test like species creation for example */
}

// OK
function createVarietyPlantCategory(Webguy $I)
{
    $I->wantTo('Create Plant Category');
    $I->amOnPage('/lisem/librinfo/varieties/plantcategory/create');
    $I->fillField("//input[contains(@id,'name')]", $I->getRandName() . '-plant-cat');
    $I->fillField("//input[contains(@id,'code')]", $I->getRandNbr());
    $I->clickCreate();
    /* @todo : should return category name to be used for other test like species creation for example */
}

function createVariety(Webguy $I)
{
    $I->wantTo('createVariety');
    $I->amOnPage('/lisem/librinfo/variety/create');
    $I->click("//a[@id='plant_type_add_choice']/i");
    $I->fillField("//div[@id='popover549508']/div[2]/div/form/div/div/div/input", $I->getRandName() . '-plant');
    $I->click("//div[@id='popover549508']/div[2]/div/form/div/div/div[2]/button");
    $I->click("//div[@id='s2id_s59edea191f677_plant_categories']/ul");
    $I->fillField("//input[@id='name']", $I->getRandName() . '-var');
    $I->fillField("//input[@id='latin_name']", $I->getRandName() . '-var-latin');
    $I->fillField("//input[@id='species']", 'sel');
    $I->click("//div[@id='s2id_s59edea191f677_packagings']/ul");
    $I->click('Generer le code');
    $I->click('input[name=btn_create_and_edit]');
    $I->click("Liste d'actions");
    $I->click('Afficher');
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
