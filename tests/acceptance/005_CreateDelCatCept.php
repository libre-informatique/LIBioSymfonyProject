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
$I->wantTo('Create and delete category');
$I->amOnPage('/app_dev.php/admin/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");
$I->waitForText('Libre', 30); // secs
$I->amOnPage('/app_dev.php/admin/librinfo/crm/category/list');
$I->waitForText('Ajouter', 30); // secs
$I->click('Ajouter');
$I->fillField("//input[contains(@id,'name')]", 'SelCat');
$I->click("//button[@name='btn_create_and_list']");
$I->click('//label/div/ins');
$I->click("//input[@value='OK']");
$I->click("//button[@type='submit']");