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

$I = new WebGuy($scenario);
$I->wantTo('Test All Route');

function doLogin($webGuy)
{
    $webGuy->wantTo('Login');
    //## LOGIN ####
    $webGuy->amOnPage('/admin/login');
    $webGuy->fillField("//input[@id='_username']", 'lisem@lisem.eu');
    $webGuy->fillField("//input[@id='_password']", 'lisem');
    $webGuy->click("//button[@type='submit']");
}

doLogin($I);

//## Get Some Symfony Service ####
$curRouter = $I->grabServiceFromContainer('router');
$curTranslator = $I->grabServiceFromContainer('translator');
$curCatalogue = $curTranslator->getCatalogue();
/* As we don't use the good locale ... */
if (empty($curCatalogue->all('messages'))) {
    $curCatalogue = $curCatalogue->getFallbackCatalogue();
}
$curMessage = $curCatalogue->all('messages');

foreach ($curRouter->getRouteCollection() as $curRoute) {
    $routePath = $curRoute->getPath();
    $routeDefault = $curRoute->getDefaults();
    $routeMethod = $curRoute->getMethods();
    $curAction = basename($routePath); /* ugly way to get the action */

    /* Select only usefull route (or not) */
    if (preg_match('/lisem|librinfo/', $routePath)
        && !preg_match('/{|}/', $routePath)
        && !preg_match('/login/', $routePath)) {
        /* Check if we can GET (or not) */
        if (empty($routeMethod)
            || in_array('GET', $routeMethod)) {
            /* Are we in a sonata admin ? */
            if (isset($routeDefault['_controller'])
                && array_key_exists('_sonata_admin', $routeDefault)) {
                $curAdmin = $I->grabServiceFromContainer($routeDefault['_sonata_admin']);
                $curMapper = null;
                switch ($curAction) {
                    case 'list':
                        $curMapper = 'list';
                        break;
                    case 'show':
                        $curMapper = 'show';
                        break;
                    case 'create':
                    case 'edit':
                        $curMapper = 'form';
                        break;
                }
                if (isset($curMapper)) {
                    $curLabel = $curAdmin->getLabelTranslatorStrategy()->getLabel('', '', '');
                    $I->wantTo('Test Route: ' . $routePath);
                    $I->amOnPage($routePath);
                    $I->waitForText('Libre', 10); // secs

                    $libKeys = preg_grep('/^' . $curLabel . '/', array_keys($curMessage));

                    foreach ($libKeys as $curKeys) {
                        $I->cantSeeInSource($curKeys); /* We should not see label key */
                        $I->dontSee('Stack Traces'); /* :) :) we hope so */
                    }

                    // }
                }
            }
        }
    }
}
