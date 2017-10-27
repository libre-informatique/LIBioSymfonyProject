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

// @group user

use Step\Acceptance\Lisem as LisemTester;
use Step\Acceptance\SonataSyliusUser as SonataSyliusUserTester;

$lisem = new LisemTester($scenario);
$lisem->loginLisem();
$user = new SonataSyliusUserTester($scenario);

$user->wantTo('Test Application user management');

$randIndex = rand(0, 10000);
$username = 'sel-user' . $randIndex;
$email = 'sel-user' . $randIndex . '@lisem.eu';
$password = 'sel-user' . $randIndex;

$user->createUser($username, $email, $password);
$user->logout();
$lisem->loginLisem($email, $password, true);

$user->loggedAs($username);
