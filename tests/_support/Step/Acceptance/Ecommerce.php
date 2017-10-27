<?php
namespace Step\Acceptance;

class Ecommerce extends Lisem
{

    public function activeAccount($userLogin)
    {
        $this->amGoingTo('Active Shop User Account ' . $userLogin);
        $this->amOnPage('/lisem/librinfo/ecommerce/shop_user/list');

        /* @todo may add a filer method in Step\Acceptance\Lisem */
        // $this->waitForText('Filtres', 30); // secs
        // $this->click('Filtres');
        // $this->wait(1);
        // $this->click('i.fa.fa-square-o');
        // $this->wait(1);
        // $this->click('#filter_username_value');
        // $this->fillField('#filter_username_value', $filter);
        // $this->click('button.btn.btn-primary');

        $this->filterList($userLogin, 'username'); //'a[filter-target$=username]');
        
        /* */
                
        $this->click('Éditer');
        $this->click('ins.iCheck-helper');
        $this->clickCreate('btn_update_and_list');
    }

    public function checkOrder($filter)
    {
        $this->amGoingTo('CheckCmd');
        $this->amOnPage('/lisem/librinfo/ecommerce/order/list');
        $this->waitForText('Filtres', 30); // secs
        
        /* @todo may add a filer method in Step\Acceptance\Lisem */
        $this->click('Filtres');
        $this->wait(1);
        $this->click('Nom complet client');
        $this->wait(1);
        $this->click('#filter_customer__fulltextName_value');
        $this->fillField('#filter_customer__fulltextName_value', $filter);
        $this->click('button.btn.btn-primary');
        /* */

        //$this->click('i.fa.fa-eye');
        //$this->click("Liste d'actions");
        //$this->click('Retourner à la liste');
        //$this->waitForText('Liste des commandes', 30); // secs
    }
}
