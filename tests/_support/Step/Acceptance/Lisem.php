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
    public function loginLisem($username = 'lisem@lisem.eu', $password = 'lisem')
    {
        if (!$this->loadSessionSnapshot('login')) {
            $this->amGoingTo('Test Login');
            $this->amOnPage('/lisem/login');
            $this->waitForText('Courriel', 30);
            $this->waitForText('Mot de passe', 30);
            $this->fillField("//input[@id='_username']", $username);
            $this->fillField("//input[@id='_password']", $password);
            $this->click("//button[@type='submit']");
            $this->waitForText('Libre', 30);
            $this->saveSessionSnapshot('login');
        }
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


    public function waitCube($class = 'sk-folding-cube')
    {
        $this->wait(1);
        $this->waitForElementNotVisible('.' . $class, 30);
    }

    public function generateCode($id = 'code_generate_code')
    {
        $this->click("//a[contains(@id, '" . $id . "')]");
        $this->waitCube();
    }

    public function filterList($filter, $type = 'name')
    {
        $this->click('Filtres');
        $this->waitForElementVisible('.sonata-toggle-filter', 30); // $this->wait(1);
        //$this->click($type);
        $this->click('a[filter-target$="' . $type . '"]');
        $this->wait(1);
        //$this->click('#filter_customer__fulltextName_value');
        $this->click('input[id^="filter_"][id$="_value"]');
        //$this->fillField('#filter_customer__fulltextName_value', $filter);
        $this->fillField('input[id^="filter_"][id$="_value"]', $filter);
        //$this->click('button.btn.btn-primary');
        $this->click('Filtrer');
    }
    
    public function selectSearchDrop($id, $value)
    {
        // UGLY FIRST WORKING WAY
        //$this->clickWithLeftButton('div[id^="s2id_"][id$="_producer_autocomplete_input"] a');
        //$this->pressKey('#s2id_autogen8_search', 'sel'); // ugly working way

        // UGLY SECOND WORKING WAY
        $this->clickWithLeftButton('div[id^="s2id_"][id$="' . $id . '"] a');
        $this->scrollTo('//div[@id="select2-drop"]/div/input[contains(@id,"_search")]'); // is it in the footer ? moved by js ? webdriver is not aware of this move ?
        // $this->pressKey('//div[@id="select2-drop"]/div/input[contains(@id,"_search")]', 'sel');
        //$this->pressKey('//div[@id="select2-drop"]/div/input[contains(@id,"_search")]', \WebDriverKeys::ENTER);
        // $this->fillField('//div[@id="select2-drop"]/div/input[contains(@id,"_search")]', 'sel');
        $this->fillField('//div[@id="select2-drop"]/div/input[contains(@id,"_search")]', $value);
        $this->waitCube();
        $this->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/div/div[contains(string(), "' . $value . '")]');
        $this->waitCube();
    }

    public function selectDrop($id, $value, $tag = 'a')
    {
        /* @todo test if there is more than one select on the page */
        // REAL example to click select2 elements below
        $this->clickWithLeftButton('div[id^="s2id_"][id$="' . $id . '"] ' . $tag . '');
        $this->clickWithLeftButton('//div[@id="select2-drop"]/ul/li/div[text()="' . $value . '"]');
        $this->waitCube();
    }
}
