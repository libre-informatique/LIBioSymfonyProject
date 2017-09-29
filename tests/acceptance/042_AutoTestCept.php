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

//### LOGIN ####
$I->amOnPage('/admin/login');
$I->fillField("//input[@id='_username']", 'lisem@lisem.eu');
$I->fillField("//input[@id='_password']", 'lisem');
$I->click("//button[@type='submit']");

//### ROUTER ####
$curRouter = $I->grabServiceFromContainer('router');

foreach ($curRouter->getRouteCollection() as $curRoute) {
    $routePath = $curRoute->getPath();
    $routeDefault = $curRoute->getDefaults();
    $routeMethod = $curRoute->getMethods();

    /* Select only usefull route (or not) */
    if (preg_match('/lisem|librinfo/', $routePath) && !preg_match('/{|}/', $routePath) && !preg_match('/login/', $routePath)) {
        /* Check if we can GET (or not) */
        if (empty($routeMethod) || in_array('GET', $routeMethod)) {
            /* Are we in a sonata admin ? */
            if (isset($routeDefault['_controller']) && array_key_exists('_sonata_admin', $routeDefault)) {
                /* @todo find if those route have to be disable or not */
                if (!preg_match('/export|generateEntityCode|validateVat|generateFakeEmail|batch|getAddressAutocompleteItems|generate_product_slug|setAsCoverImage/', $routePath)) {
                    // if ( preg_match('/list|create|show|edit/', $routePath)) {
                    // if (preg_match('/packaging/', $routePath)) {
                    dump($curRoute->getPath());
                    #dump($curRoute->getMethods());
                    #dump($curRoute->getRequirements());
                    #dump($curRoute->getOptions());
                    #dump($curRoute->getDefaults());
                    #dump($curRoute->getCondition());
                    #dump('######################################################################');
                    $I->amOnPage($routePath);
                    $I->waitForText('Libre', 10); // secs
                    // }
                }
            }
        }
    }
}

//dump($I);
//$I->getSymfonyRoute();
//->getModule('Symfony')->grabServiceFromContainer('myservice');
// $curContainer = $I
//               ->getModule('Symfony')
//               ->grabService('kernel')
//               ->getContainer();

// $curRouter = $I->getModule('Symfony')->grabServiceFromContainer('router');

// foreach ($curContainer->get('router')->getRouteCollection() as $curRoute) {
//     dump('1');
//     dump($curRoute);
// }
