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

namespace Step\Acceptance;

class Sylius extends Common
{
    public function loginSylius($userLogin, $userPassword = 'selpwd')
    {
        $this->amGoingTo('Login Online Shop as ' . $userLogin);
        $this->amOnPage('/');
        $this->click('Connexion');
        $this->fillField('#_username', $userLogin);
        $this->fillField('#_password', $userPassword);
        $this->click("//button[@type='submit']");
        $this->see('Mon compte Gérer vos informations personnelles et préférences', '//h1');
    }

    public function createAccount($userName = null, $userEmail = null, $userPassword = 'selpwd')
    {
        $userName = (isset($userName)) ? $userName : $this->getRandName() . '-shop-user';
        /* warning there is a big exception if the email is already used by someone else */
        $userEmail = (isset($userEmail)) ? $userEmail : $userName . '@lisem.eu';

        $this->amGoingTo('Create Shop User Account ' . $userName);
        $this->amOnPage('/');
        $this->click('Connexion');
        $this->click("(//a[contains(@href, '/register')])[2]");
        $this->fillField('#sylius_customer_registration_firstName', $userName . '-First');
        $this->fillField('#sylius_customer_registration_lastName', $userName . '-Last');
        $this->fillField('#sylius_customer_registration_email', $userEmail);
        $this->fillField('#sylius_customer_registration_user_plainPassword_first', $userPassword);
        $this->fillField('#sylius_customer_registration_user_plainPassword_second', $userPassword);
        $this->click("//button[@type='submit']");
        $this->waitForText('Succès', 10); // secs
        return $userEmail;
    }


    public function addToCart($productName = 'carotte-nantaise')
    {
        $this->amGoingTo('Add To Cart ' . $productName);
        $this->amOnPage('/products/' . $productName);
        $this->waitForText('Ajouter au panier', 30);
        $this->click("//button[@type='submit']");// $this->click('Ajouter au panier');
        $this->waitForText('Votre panier', 30);
    }

    public function checkoutCart()
    {
        /** @todo add param for shipping method and other option */
        $this->amGoingTo('Checkout Current Cart');
        $this->amOnPage('/cart');
        $this->waitForText('Paiement', 30);
        //$this->click('Paiement');
        $this->click("(//a[contains(@href, '/checkout')])[2]");
        $this->fillField('#sylius_checkout_address_shippingAddress_firstName', 'selfirst');
        $this->fillField('#sylius_checkout_address_shippingAddress_lastName', 'sellast');
        $this->fillField('#sylius_checkout_address_shippingAddress_street', 'sel street');
        $this->fillField('#sylius_checkout_address_shippingAddress_city', 'sel city');
        $this->fillField('#sylius_checkout_address_shippingAddress_postCode', '29');
        $this->scrollTo('#next-step');
        $this->click('#next-step');
        $this->waitForText('Suivant', 30);
        $this->scrollTo('#next-step');
        $this->click('#next-step');
        $this->waitForText('Suivant', 30);
        $this->scrollTo('#next-step');
        $this->click('#next-step');
        $this->waitForText('Récapitulatif de votre commande', 30);
        $this->scrollTo("//button[@type='submit']");
        $this->click("//button[@type='submit']");
        $this->see('Merci ! Votre commande a bien été prise en compte.', '#sylius-thank-you');
    }


    public function createOrder()
    {
        $I = $this;
    }
}
