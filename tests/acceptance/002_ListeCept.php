<?php
$I = new WebGuy($scenario);
$I->wantTo("Click on Menu List");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");

$I->click("Relations publiques");
$I->waitForText('Liste des Tiers', 30); // secs
$I->click("Liste des Tiers");
$I->waitForText('Liste des Emails', 30); // secs
$I->click("Liste des Emails");

$I->click("Variétés");
$I->waitForText('Liste des Variétés', 30); // secs
$I->click("Liste des Variétés");
$I->waitForText('Liste des Espèces', 30); // secs
$I->click("Liste des Espèces");

$I->click("Lots");
$I->waitForText('Liste des Lots', 30); // secs
$I->click("Liste des Lots");
$I->waitForText('Liste des Producteurs', 30); // secs
$I->click("Liste des Producteurs");
$I->waitForText('Liste des Parcelles', 30); // secs
$I->click("Liste des Parcelles");

$I->click("Articles");
$I->waitForText('Liste des Articles (semences)', 30); // secs
$I->click("Liste des Articles (semences)");
$I->waitForText('Liste des Articles (autres)', 30); // secs
$I->click("Liste des Articles (autres)");

$I->click("Commandes");
$I->waitForText('Liste des Commandes', 30); // secs
$I->click("Liste des Commandes");
$I->waitForText('Liste des Clients', 30); // secs
$I->click("Liste des Clients");

$I->click("Gestion / Compta");
$I->waitForText('Livre de caisse', 30); // secs
$I->click("Livre de caisse");

$I->click("Paramétrage");
$I->waitForText('Application', 30); // secs
$I->click("Application");
