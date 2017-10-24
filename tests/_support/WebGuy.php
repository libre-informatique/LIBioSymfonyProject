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

class WebGuy extends \Codeception\Actor
{
    use _generated\WebGuyActions;

    public function loginLisem()
    {
        $this->wantTo('Test Login');
        $this->amOnPage('/lisem/login');
        $this->waitForText('Courriel', 30);
        $this->waitForText('Mot de passe', 30);
        $this->fillField("//input[@id='_username']", 'lisem@lisem.eu');
        $this->fillField("//input[@id='_password']", 'lisem');
        $this->click("//button[@type='submit']");
        $this->waitForText('Libre', 30);
    }

    public function testLink($linkName, $linkRes = null)
    {
        $linkRes = (isset($linkRes)) ? $linkRes : $linkName;
        $this->waitForText($linkName, 30); // secs
        $this->click($linkName);
        $this->waitForText($linkRes, 30); // secs
    }

    public function selectDrop($id, $value)
    {
        /* @todo test if there is more than one select on the page */
        // REAL example to click select2 elements below
        /* where does the s2id come from */
        $this->clickWithLeftButton('div[id^="s2id_"][id$="' . $id . '"] a');
        $this->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/div[text()="' . $value . '"]');
    }
}
