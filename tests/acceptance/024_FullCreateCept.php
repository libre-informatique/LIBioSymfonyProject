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
// @group variety 
// @group seedbatch

use Step\Acceptance\Variety as VarietyTester;
use Step\Acceptance\Lisem as LisemTester;

$lisem = new LisemTester($scenario);
$variety = new VarietyTester($scenario);

$lisem->loginLisem();


// Variety Test
$selGenus = $variety->createGenus();
$selPlantCat =  $variety->createPlantCategory();
$selSpecies = $variety->createSpecies($selGenus, $selPlantCat);
$selVariety = $variety->create($selSpecies, $selPlantCat);

// SeedBatch Test
//$selProducer = createSeedBatchProducer($I);



function createSeedBatchPlot(Webguy $I)
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
    $producerName =  $I->getRandName() . '-producer';
    $I->wantTo('Create a producer ' . $producerName);
    $I->amOnPage('/lisem/librinfo/seedbatch/seed-producer/create');

    //$I->click("//li[2]/div/label/div/ins"); //ugly work
    /* @todo: find a way to click without use li[2] ... */
    $I->click("//ul[contains(@id, '_isIndividual')]/li[2]/div/label/div/ins"); //ugly too

    $I->selectDrop('_title', 'Mme');
    $I->fillField("//input[contains(@id,'_firstname')]", $producerName);
    $I->fillField("//input[contains(@id,'_lastname')]", 'last-' . $producerName);
    $I->fillField("//input[contains(@id,'_email')]", $producerName . '@lisem.eu');
    $I->clickCreate();
    return $producerName;
}
