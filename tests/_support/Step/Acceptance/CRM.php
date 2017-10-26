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

class CRM extends \WebGuy
{
    public function createCircle($groupName = 'SelGroup', $groupCode = 'SELGRP')
    {
        $this->goingTo('Create Circle ' . $groupName . '(' .  $groupCode . ')');
        $this->amOnPage('/lisem/librinfo/crm/circle/list');
        $this->testLink('Ajouter', 'Nom');
        $this->fillField("//input[contains(@id, 'name')]", $groupName);
        $this->fillField("//input[contains(@id, 'code')]", $groupCode);
        $this->fillField("//textarea[contains(@id, 'description')]", 'Sel desc');
        $this->selectDrop('_type', 'Autres');

        $this->clickCreate();
    }

    public function deleteCircle($filter = 'Sel')
    {
        $this->goingTo('Delete Circle ' . $filter);
        $this->amOnPage('/lisem/librinfo/crm/circle/list');
        $this->testLink('Filtres');
        $this->wait(1);
        $this->click('i.fa.fa-square-o');
        //$this->click("//ul[2]/li/ul/li/a/i");
        $this->wait(1);
        $this->click("//input[@id='filter_name_value']");
        $this->fillField("//input[@id='filter_name_value']", $filter);
        $this->click("//button[@type='submit']");
        $this->wait(1);
        $this->click('//label/div/ins');
        $this->click("//input[@value='OK']");
        $this->click("//button[@type='submit']");
        $this->waitForText('succès', 30); // secs
    }

    public function createCategory($selCat, $selCatParent = null)
    {
        $this->goingTo('Create Category ' . $selCat);

        $this->amOnPage('/lisem/librinfo/crm/category/list');
        $this->testLink('Ajouter', 'Nom');

        $this->fillField("//input[contains(@id,'name')]", $selCat);
        if (isset($selCatParent)) {
            $this->selectDrop('_treeParent', 'SelCatParent');
        }
        $this->clickCreate();
    }

    public function deleteCategory($filter = 'Sel')
    {
        $this->goingTo('Delete Category ' . $filter);
        $this->amOnPage('/lisem/librinfo/crm/category/list');
        $this->testLink('Filtres');
        $this->wait(1);
        $this->click('i.fa.fa-square-o');
        $this->wait(1);
        $this->click("//input[@id='filter_name_value']");
        $this->fillField("//input[@id='filter_name_value']", $filter);
        $this->click("//button[@type='submit']");
        $this->click('//label/div/ins');
        $this->click("//input[@value='OK']");
        $this->click("//button[@type='submit']");
        $this->waitForText('succès', 30); // secs
    }
}
