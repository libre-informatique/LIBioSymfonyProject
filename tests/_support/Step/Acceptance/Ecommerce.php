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

class Ecommerce extends Lisem
{
    public function activeAccount($userLogin)
    {
        $this->amGoingTo('Active Shop User Account ' . $userLogin);
        $this->amOnPage('/lisem/librinfo/ecommerce/shop_user/list');

        $this->filterList($userLogin, 'username');

        $this->click('Éditer');
        //$this->click('ins.iCheck-helper');
        $this->clickCheckbox('enabled');
        
        $this->clickCreate('btn_update_and_list');
    }

    public function checkOrder($customerName)
    {
        $this->amGoingTo('CheckCmd');
        $this->amOnPage('/lisem/librinfo/ecommerce/order/list');

        $this->filterList($customerName, 'fulltextName');

        //$this->click('i.fa.fa-eye');
        //$this->click("Liste d'actions");
        //$this->click('Retourner à la liste');
        //$this->waitForText('Liste des commandes', 30); // secs
    }
}
