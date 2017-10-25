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

class Lisem extends \WebGuy
{
    public function loginLisem()
    {
        if (!$this->loadSessionSnapshot('login')) {
            $this->wantTo('Test Login');
            $this->amOnPage('/lisem/login');
            $this->waitForText('Courriel', 30);
            $this->waitForText('Mot de passe', 30);
            $this->fillField("//input[@id='_username']", 'lisem@lisem.eu');
            $this->fillField("//input[@id='_password']", 'lisem');
            $this->click("//button[@type='submit']");
            $this->waitForText('Libre', 30);
            $this->saveSessionSnapshot('login');
        }
    }
}
