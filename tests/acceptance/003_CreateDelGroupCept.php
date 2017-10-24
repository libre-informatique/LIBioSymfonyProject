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

$I->wantTo('Create And Delete Group (Circle)');
createCRMCircle($I);
deleteCRMCircle($I);
createCRMCircle($I);

function createCRMCircle($I)
{
    $I->wantTo('Create Group (Circle)');
    $I->amOnPage('/lisem/librinfo/crm/circle/list');
    $I->testLink('Ajouter', 'Nom');
    $I->fillField("//input[contains(@id, 'name')]", 'SelGroup');
    $I->fillField("//input[contains(@id, 'code')]", 'SELGRP');
    $I->fillField("//textarea[contains(@id, 'description')]", 'Sel desc');
    $I->selectDrop('_type', 'Autres');

    $I->clickCreate();
}

function deleteCRMCircle($I)
{
    $I->wantTo('Delete Group (Circle)');
    $I->amOnPage('/lisem/librinfo/crm/circle/list');
    $I->testLink('Filtres');
    $I->wait(1);
    $I->click('i.fa.fa-square-o');
    //$I->click("//ul[2]/li/ul/li/a/i");
    $I->wait(1);
    $I->click("//input[@id='filter_name_value']");
    $I->fillField("//input[@id='filter_name_value']", 'Sel');
    $I->click("//button[@type='submit']");
    $I->wait(1);
    $I->click('//label/div/ins');
    $I->click("//input[@value='OK']");
    $I->click("//button[@type='submit']");
    $I->waitForText('succès', 30); // secs
}
