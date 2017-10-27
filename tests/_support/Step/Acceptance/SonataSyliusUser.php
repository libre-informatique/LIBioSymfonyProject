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

// @group user

namespace Step\Acceptance;

class SonataSyliusUser extends Lisem
{
    public function createUser($username = 'sel-user', $email = 'sel-user@lisem.eu', $password = 'sel-user')
    {
        $this->amGoingTo('Create User ' . $username . '( with email' . $email . ' and password ' . $password . ')');
        $this->amOnPage('/lisem/librinfo/sonatasyliususer/sonatauser/list');
        $this->testLink('Ajouter', "Nom d'utilisateur");
        $this->fillField("//input[contains(@id, 'username')]", $username);
        $this->fillField("//input[contains(@id, 'firstName')]", $username . '-first');
        $this->fillField("//input[contains(@id, 'lastName')]", $username . '-last');
        $this->fillField("//input[contains(@id, 'email')]", $email);
        $this->clickCheckbox('enabled');
        $this->fillField("//input[contains(@id, 'plainPassword_first')]", $password);
        $this->fillField("//input[contains(@id, 'plainPassword_second')]", $password);

        $this->clickCreate();
    }

    public function loggedAs($email)
    {
        $this->amGoingTo('Check that I am logged in as user ' . $email);
        $this->amOnPage('/lisem/dashboard');
        $this->click('li.dropdown.user-menu a');
        $this->waitforText($email, 30);
    }
}
