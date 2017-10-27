<?php
namespace Step\Acceptance;

class Ecommerce extends Lisem
{

    public function activeAccount($userLogin)
    {
        $this->amGoingTo('Active Shop User Account ' . $userLogin);
        $this->amOnPage('/lisem/librinfo/ecommerce/shop_user/list');

        $this->filterList($userLogin, 'username');
        
        $this->click('Éditer');
        $this->click('ins.iCheck-helper');
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
