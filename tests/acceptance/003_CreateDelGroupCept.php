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

$I = new WebGuy($scenario);
$I->wantTo('Create And Delete Group');
$I->amOnPage('/lisem/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");
$I->waitForText('Libre', 30); // secs
$I->amOnPage('/lisem/librinfo/crm/circle/list');
$I->waitForText('Ajouter', 30); // secs
$I->click('Ajouter');
$I->fillField("//input[contains(@id, 'name')]", 'SelGroup');
$I->fillField("//input[contains(@id, 'code')]", 'SELGRP');
$I->fillField("//textarea[contains(@id, 'description')]", 'Sel desc');
$I->click('Historique');
$I->waitForText('Historique', 10);

$I->scrollTo("//button[@name='btn_create_and_list']", 100, 100);
$I->click("//button[@name='btn_create_and_list']");

$I->waitForText('Filtres', 30); // secs
$I->click('Filtres');
$I->click('i.fa.fa-square-o');
//$I->click("//ul[2]/li/ul/li/a/i");
$I->click("//input[@id='filter_name_value']");
$I->fillField("//input[@id='filter_name_value']", 'Sel');
$I->click("//button[@type='submit']");
//$I->click('//label/div/ins');
//$I->click("//input[@value='OK']");
//$I->click("//button[@type='submit']");
