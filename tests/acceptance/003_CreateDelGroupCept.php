<?php
$I = new WebGuy($scenario);
$I->wantTo("Create And Delete Group");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
$I->amOnPage("/app_dev.php/admin/librinfo/crm/circle/list");
$I->click("Ajouter");
$I->fillField("//input[contains(@id, 'name')]", "SelGroup");
$I->fillField("//input[contains(@id, 'code')]", "SELGRP");
$I->fillField("//textarea[contains(@id, 'description')]", "Sel desc");
$I->click("Historique");
$I->click("//button[@name='btn_create_and_list']");
$I->waitForElement('i.fa-filter', 30); // secs
$I->click("Filtres");
$I->click("i.fa.fa-square-o");
//$I->click("//ul[2]/li/ul/li/a/i");
$I->click("//input[@id='filter_name_value']");
$I->fillField("//input[@id='filter_name_value']", "Sel");
$I->click("//button[@type='submit']");
$I->click("//label/div/ins");
$I->click("//input[@value='OK']");
$I->click("//button[@type='submit']");
