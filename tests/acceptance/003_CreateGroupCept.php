<?php
$I = new WebGuy($scenario);
$I->wantTo("002_CreateGroupCept");
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
