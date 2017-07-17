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
$I->wantTo('Add and Remove Tiers');
$I->amOnPage('/admin/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");
$I->waitForText('Libre', 30); // secs
$I->amOnPage('/admin/librinfo/seedbatch/organism/list');
$I->waitForText('Ajouter', 30); // secs
$I->click('Ajouter');
$I->fillField("//input[contains(@id,'_name')]", 'SelCol');
$I->fillField("//input[contains(@id,'email')]", 'sel@col.fr');
$I->click('input[id$="_emailNpai"]+ins');

$I->clickWithLeftButton('div[id^="s2id_"][id$="_circles"] ul');
$I->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/ul/li/div[text()="SELGRP SelGroup"]');

$I->fillField("//textarea[contains(@id,'description')]", 'Selenium Test');

// $I->click("Coordonnées");
// $I->click("Historique");
// $I->click("Général");

$I->click("//button[@name='btn_create_and_list']");
$I->waitForText('Filtres', 30); // secs
$I->click('Filtres');
$I->click('i.fa.fa-square-o');
$I->click("//input[@id='filter_name_value']");
$I->fillField("//input[@id='filter_name_value']", 'Sel');
$I->click("//button[@type='submit']");
$I->click('//label/div/ins');
$I->click("//input[@value='OK']");
$I->click("//button[@type='submit']");
// @todo should check if tiers is deleted as a bug fix test
