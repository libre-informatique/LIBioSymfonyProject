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

function testLink($I, $linkName)
{
    $I->waitForText($linkName, 30); // secs
    $I->click($linkName);
    $I->waitForText($linkName, 30); // secs
}

$I = new WebGuy($scenario);
$I->wantTo('Click on Menu List');
$I->amOnPage('/lisem/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");

testLink($I, 'Contacts');
testLink($I, 'Emailing');
testLink($I, 'Èspèces');
testLink($I, 'Variétés');
testLink($I, 'Lots');
testLink($I, 'Parcelles');
//testLink($I, 'Producteurs');
$I->click('Articles');
testLink($I, 'Semences');
testLink($I, 'Autres');

// testLink($I, 'Conditionnement');
// testLink($I, 'Inventaire');
// testLink($I, 'Catalogues');
testLink($I, 'Commandes');

$I->click('Gestion / Compta');
testLink($I, 'Livre de caisse');

// $I->click('Paramétrage');
// $I->click('Relations publiques');
// $I->click('Groupes');
// $I->waitForText('Paramétrage', 30); // secs

// $I->click('Paramétrage');
// $I->click('Relations publiques');
// $I->click('Groupes');
// $I->click('Catégories');
