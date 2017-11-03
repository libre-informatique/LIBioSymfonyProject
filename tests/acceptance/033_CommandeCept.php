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

// @group ecommerce
// @group all

use Step\Acceptance\Lisem as LisemTester;
use Step\Acceptance\Ecommerce as EcommerceTester;
use Step\Acceptance\Sylius as SyliusTester;

$lisem = new LisemTester($scenario);
$ecommerce = new EcommerceTester($scenario);
$sylius = new SyliusTester($scenario);

$lisem->loginLisem();
$lisem->amGoingTo('Test Order from Sylius To Lisem');

//$ecommerce->createChannel($lisem->getRandName() . '-chan');

$randSelName = $lisem->getRandName() . '-shop-user';
$randSelEmail = $randSelName . '@lisem.eu';
$sylius->createAccount($randSelName, $randSelEmail);
$ecommerce->activeAccount($randSelEmail);
$sylius->loginSylius($randSelEmail);

//$sylius->addToCart();
$sylius->addToCart('coriandre');
//$sylius->addToCart('carotte-de-l-est');
$sylius->addToCart('tomate-saint-pierre');
//$sylius->addToCart('tomate-merveille-des-marches');
$sylius->checkoutCart();

$ecommerce->checkOrder($randSelName);
