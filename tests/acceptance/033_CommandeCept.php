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

// @group scenarii
 // @group ecommerce

use Step\Acceptance\Lisem as LisemTester;
use Step\Acceptance\Ecommerce as EcommerceTester;

$lisem = new LisemTester($scenario);
$ecommerce = new EcommerceTester($scenario);
$lisem->loginLisem();
$lisem->amGoingTo('Test Order from Sylius To Lisem');


$randNbr = $lisem->getRandNbr();
$randSelEmail = $lisem->getRandName() . '@lisem.eu';
$randName = $lisem->getRandName();

SyliusCreateAccount($lisem, $randSelEmail, $randName);
//ActiveUser($lisem, $randSelEmail);
$ecommerce->activeAccount($randSelEmail);
LogUser($lisem, $randSelEmail);
CreateCmd($lisem);
//CheckCmd($lisem, $randName);
$ecommerce->checkOrder($randSelEmail);

//$ecommerce->checkOrder('sel-8053@lisem.eu');

function SyliusCreateAccount($webGuy, $selEmail, $selName)
{
    /* warning there is a big exception if the email is already used by someone else */
    $webGuy->amGoingTo('SyliusCreateAccount');
    $webGuy->amOnPage('/');
    $webGuy->click('Connexion');
    $webGuy->click("(//a[contains(@href, '/register')])[2]");
    $webGuy->fillField('#sylius_customer_registration_firstName', $selName . '-First');
    $webGuy->fillField('#sylius_customer_registration_lastName', $selName . '-Last');
    $webGuy->fillField('#sylius_customer_registration_email', $selEmail);
    $webGuy->fillField('#sylius_customer_registration_user_plainPassword_first', 'selpwd');
    $webGuy->fillField('#sylius_customer_registration_user_plainPassword_second', 'selpwd');
    $webGuy->click("//button[@type='submit']");
    $webGuy->waitForText('Succès', 10); // secs
}

function LogUser($webGuy, $selEmail)
{
    $webGuy->amGoingTo('LogUser');
    $webGuy->amOnPage('/');
    $webGuy->click('Connexion');
    $webGuy->fillField('#_username', $selEmail);
    $webGuy->fillField('#_password', 'selpwd');
    //$webGuy->click("//button[@type='submit']");
    $webGuy->click("//button[@type='submit']");
    $webGuy->see('Mon compte Gérer vos informations personnelles et préférences', '//h1');
}

function CreateCmd($webGuy)
{
    $webGuy->amGoingTo('CreateCmd');
    $webGuy->amOnPage('/');
    // $webGuy->amOnPage("/taxons/legumes-fruit");
    // $webGuy->click("Semences");
    // $webGuy->click("Légumes-fruit");
    // $webGuy->scrollTo("Carotte nantaise", 100, 100);
    //$webGuy->click("Carotte nantaise");
    $webGuy->amOnPage('/products/carotte-nantaise'); /* Hum... Carotte */
    $webGuy->click("//button[@type='submit']");
    //$webGuy->wait(5);
    //$webGuy->waitForText('Paiement', 30);
    $webGuy->waitForElementVisible("(//a[contains(@href, '/checkout')])[2]", 30);
    $webGuy->click("(//a[contains(@href, '/checkout')])[2]");
    //    $webGuy->click("(//a[contains(text(),'Paiement')])[2]");
    $webGuy->fillField('#sylius_checkout_address_shippingAddress_firstName', 'selfirst');
    $webGuy->fillField('#sylius_checkout_address_shippingAddress_lastName', 'sellast');
    $webGuy->fillField('#sylius_checkout_address_shippingAddress_street', 'sel street');
    $webGuy->fillField('#sylius_checkout_address_shippingAddress_city', 'sel city');
    $webGuy->fillField('#sylius_checkout_address_shippingAddress_postCode', '29');
    $webGuy->scrollTo('#next-step');
    $webGuy->click('#next-step');
    $webGuy->waitForText('Suivant', 30);
    $webGuy->scrollTo('#next-step');
    $webGuy->click('#next-step');
    $webGuy->waitForText('Suivant', 30);
    $webGuy->scrollTo('#next-step');
    $webGuy->click('#next-step');

    $webGuy->waitForText('Récapitulatif de votre commande', 30);
    $webGuy->scrollTo("//button[@type='submit']");
    $webGuy->click("//button[@type='submit']");
    $webGuy->see('Merci ! Votre commande a bien été prise en compte.', '#sylius-thank-you');
}
