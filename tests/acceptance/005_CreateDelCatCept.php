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

// @group crm

$I = new WebGuy($scenario);

$I->loginLisem();

$I->wantTo('Create and delete category');
$cat = 'SelCat';
$catParent = 'SelCatParent';

createCRMCategory($I, $catParent);
createCRMCategory($I, $cat, $catParent);
deleteCRMCategory($I);

function createCRMCategory($I, $selCat, $selCatParent = null)
{
    $I->wantTo('Create Category');

    $I->amOnPage('/lisem/librinfo/crm/category/list');
    $I->testLink('Ajouter', 'Nom');

    $I->fillField("//input[contains(@id,'name')]", $selCat);
    if (isset($selCatParent)) {
        $I->selectDrop('_treeParent', 'SelCatParent');
    }
    $I->clickCreateAndList();
}

function deleteCRMCategory($I)
{
    $I->wantTo('Delete Category');
    $I->amOnPage('/lisem/librinfo/crm/category/list');
    $I->testLink('Filtres');
    $I->wait(1);
    $I->click('i.fa.fa-square-o');
    $I->wait(1);
    $I->click("//input[@id='filter_name_value']");
    $I->fillField("//input[@id='filter_name_value']", 'Sel');
    $I->click("//button[@type='submit']");
    $I->click('//label/div/ins');
    $I->click("//input[@value='OK']");
    $I->click("//button[@type='submit']");
    $I->waitForText('succès', 30); // secs
}
