<?php
$I = new WebGuy($scenario);
$I->wantTo("DelGrpCept");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
$I->click("//li[7]/a/span");
$I->click("//li[7]/ul/li[2]/a/span");
$I->click("Groupes");
$I->click("Filtres");
$I->click("//ul[2]/li/ul/li/a/i");
$I->click("//input[@id='filter_name_value']");
$I->fillField("//input[@id='filter_name_value']", "SelGroup");
$I->click("//button[@type='submit']");
$I->click("//td/div/ins");
$I->click("//input[@value='OK']");
$I->click("//button[@type='submit']");
//$I->verifyText("//body/div/div/section/div", 'Les éléments séléctionnés ont été supprimés avec succès.');
