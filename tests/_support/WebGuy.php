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

    public $randNbr = null;
    public $randName = null;

    public function setRand($new = false)
    {
        if ($new || !isset($this->randNbr)) {
            $this->randNbr = rand(1, 10000);
            $this->randName = 'sel-' . $this->randNbr;
        }
    }

    public function getRandNbr($new = false)
    {
        $this->setRand($new);

        return $this->randNbr;
    }

    public function getRandName($new = false)
    {
        $this->setRand($new);

        return $this->randName;
    }

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

    public function hideSymfonyToolBar()
    {
        try {
            $this->seeElement('.hide-button');
            $this->click(['css' => '.hide-button']);
        } catch (Exception $e) {
        }
    }

    public function scrollDown()
    {
        $this->executeJS('window.scrollTo(0, document.body.scrollHeight);');
    }

    public function clickCreate($name = 'btn_create_and_list')
    {
        /* @todo: do the same for confirm action and for list batch action button */
        $this->hideSymfonyToolBar();
        //$this->resizeWindow(2048, 2048);
        //$this->scrollDown();
        $this->scrollTo("//button[@name='" . $name . "']"); //, 10, 10);
        //$this->resizeWindow(1024, 1024);
        //$this->wait(30);
        $this->click("//button[@name='" . $name . "']");
        $this->waitForText('succès', 30); // secs
    }

    public function testLink($linkName, $linkRes = null)
    {
        $linkRes = (isset($linkRes)) ? $linkRes : $linkName;
        $this->waitForText($linkName, 30); // secs
        $this->click($linkName);
        $this->waitForText($linkRes, 30); // secs
    }

    public function selectDrop($id, $value, $tag = 'a')
    {
        /* @todo test if there is more than one select on the page */
        // REAL example to click select2 elements below
        /* where does the s2id come from */
        $this->clickWithLeftButton('div[id^="s2id_"][id$="' . $id . '"] ' . $tag . '');
        $this->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/div[text()="' . $value . '"]');
    }
}
