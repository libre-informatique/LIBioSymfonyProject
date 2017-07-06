<?php
$I = new WebGuy($scenario);
$I->wantTo("003_Tiers");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
$I->waitForText('Libre', 30); // secs
$I->amOnPage("/app_dev.php/admin/librinfo/seedbatch/organism/list");
$I->waitForText('Ajouter', 30); // secs
$I->click("Ajouter");
$I->fillField("//input[contains(@id,'_name')]", "SelCol");
$I->fillField("//input[contains(@id,'email')]", "sel@col.fr");
$I->click("//div[contains(@id,'email')]/div/div/label/div/ins");
$I->click("//div[contains(@id,'email')]/div/div[2]/label/div/ins");
$I->click("//div[contains(@id,'email')]/div/div/label/div/ins");
$I->selectOption("//select[contains(@id,'category')]", "SelCat");
$I->selectOption("//select[contains(@id,'circles')]", "SELGRP SelGroup", false);
$I->click("Coordonnées");
$I->click("Historique");
$I->click("Général");
$I->fillField("//textarea[contains(@id,'description')]", "Selenium Test");
$I->click("//button[@name='btn_create_and_list']");
$I->waitForText('Filtres', 30); // secs
$I->click("Filtres");
$I->click("i.fa.fa-square-o");
$I->click("//input[@id='filter_name_value']");
$I->fillField("//input[@id='filter_name_value']", "Sel");
$I->click("//button[@type='submit']");
$I->click("//label/div/ins");
$I->click("//input[@value='OK']");
$I->click("//button[@type='submit']");
$I->waitForText('Ajouter', 30); // secs
$I->click("Ajouter");
$I->fillField("//input[contains(@id,'_name')]", "SelCol");
$I->fillField("//input[contains(@id,'email')]", "sel@col.fr");
$I->click("//div[contains(@id,'email')]/div/div/label/div/ins");
$I->click("//div[contains(@id,'email')]/div/div[2]/label/div/ins");
$I->click("//div[contains(@id,'email')]/div/div/label/div/ins");
$I->selectOption("//select[contains(@id,'category')]", "SelCat");
$I->selectOption("//select[contains(@id,'circles')]", "SELGRP SelGroup", false);
$I->click("Coordonnées");
$I->click("Historique");
$I->click("Général");
$I->fillField("//textarea[contains(@id,'description')]", "Selenium Test");
$I->click("//button[@name='btn_create_and_list']");
