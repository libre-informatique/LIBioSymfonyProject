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

// @group menu


$I = new WebGuy($scenario);
$I->loginLisem();

$I->wantTo('Click on Menu List');
$I->testLink('Contacts');
$I->testLink('Emailing');
$I->testLink('Èspèces');
$I->testLink('Variétés');
$I->testLink('Lots');
$I->testLink('Parcelles');
//$I->testLink('Tests de germination');
$I->testLink('Producteurs');
$I->click('Articles');
$I->testLink('Semences');
$I->testLink('Autres');

//$I->testLink('Conditionnement');
//$I->testLink('Inventaire');
//$I->testLink('Catalogues');
$I->testLink('Commandes');

$I->click('Gestion / Compta');
$I->testLink('Journal des ventes');
$I->testLink('Livre de caisse');
