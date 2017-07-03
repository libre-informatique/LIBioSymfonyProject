<?php
$I = new WebGuy($scenario);
$I->wantTo("Test Login");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
