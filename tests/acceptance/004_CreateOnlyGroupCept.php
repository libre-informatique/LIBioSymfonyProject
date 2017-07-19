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
$I->wantTo('Create Group');
$I->amOnPage('/admin/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");
$I->waitForText('Libre', 30); // secs
$I->amOnPage('/admin/librinfo/crm/circle/list');
$I->waitForText('Ajouter', 30); // secs
$I->click('Ajouter');
$I->fillField("//input[contains(@id, '_name')]", 'SelGroup');
$I->fillField("//input[contains(@id, '_code')]", 'SELGRP');
$I->fillField("//textarea[contains(@id, '_description')]", 'Sel desc');

// REAL example to click select2 elements below
$I->clickWithLeftButton('div[id^="s2id_"][id$="_type"] a');
$I->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/div[text()="Autres"]');

// $I->click('Historique');

$I->scrollTo("//button[@name='btn_create_and_list']", 100, 100);
$I->click("//button[@name='btn_create_and_list']");
