<?php
$I = new WebGuy($scenario);
$I->wantTo("002_CatCreateOnly");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
$I->amOnPage("/app_dev.php/admin/librinfo/crm/category/list");
$I->click("Ajouter");
$I->fillField("//input[contains(@id,'name')]", "SelCat");
$I->click("//button[@name='btn_create_and_list']");

