<?php
$I = new WebGuy($scenario);
$I->wantTo("Menu List");
$I->amOnPage("/app_dev.php/admin/login");
$I->fillField("//input[@id='_username']", "lisem@lisem.eu");
$I->fillField("//input[@id='_password']", "lisem");
$I->click("//button[@type='submit']");
$I->click("Relations publiques");
$I->click("Liste des Tiers");
$I->click("Liste des Emails");
$I->click("Variétés");
$I->click("Liste des Variétés");
$I->click("Liste des Espèces");
$I->click("Lots");
$I->click("Liste des Lots");
$I->click("Liste des Producteurs");
$I->click("Liste des Parcelles");
$I->click("Articles");
$I->click("Liste des Articles (semences)");
$I->click("Liste des Articles (autres)");
$I->click("Commandes");
$I->click("Liste des Commandes");
$I->click("Liste des Clients");
$I->click("Gestion / Compta");
$I->click("Livre de caisse");
$I->click("Paramétrage");
$I->click("Application");
$I->click("Relations publiques");