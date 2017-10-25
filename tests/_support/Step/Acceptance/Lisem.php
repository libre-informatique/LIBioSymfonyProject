<?php
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
