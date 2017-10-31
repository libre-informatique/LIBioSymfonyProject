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
    public function createAccount()
    {
        $userName = $this->getRandName() . '-shop-user';
        /* warning there is a big exception if the email is already used by someone else */
        $userEmail = $userName . '@lisem.eu';

        $this->amGoingTo('Create Shop User Account ' . $userName);
        $this->amOnPage('/');
        $this->click('Connexion');
        $this->click("(//a[contains(@href, '/register')])[2]");
        $this->fillField('#sylius_customer_registration_firstName', $userName . '-First');
        $this->fillField('#sylius_customer_registration_lastName', $userName . '-Last');
        $this->fillField('#sylius_customer_registration_email', $userEmail);
        $this->fillField('#sylius_customer_registration_user_plainPassword_first', 'selpwd');
        $this->fillField('#sylius_customer_registration_user_plainPassword_second', 'selpwd');
        $this->click("//button[@type='submit']");
        $this->waitForText('Succès', 10); // secs
        return $userEmail;
    }

    public function logUser($userLogin, $userPassword = 'selpwd')
    {
        $sessionSnapShot = 'login_sylius_' . $username;
        if (!$this->loadSessionSnapshot($sessionSnapShot)) {
            $this->amGoingTo('Login Online Shop as ' . $userLogin);
            $this->amOnPage('/');
            $this->click('Connexion');
            $this->fillField('#_username', $userLogin);
            $this->fillField('#_password', $userPassword);
            $this->click("//button[@type='submit']");
            $this->see('Mon compte Gérer vos informations personnelles et préférences', '//h1');
            $this->saveSessionSnapshot($sessionSnapShot);
        }
    }
    
    public function createOrder()
    {
        $I = $this;
    }
}
