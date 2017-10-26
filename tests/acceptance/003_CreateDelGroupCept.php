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

// @group crm

use Step\Acceptance\CRM as CRMTester;
use Step\Acceptance\Lisem as LisemTester;

$lisem = new LisemTester($scenario);
$lisem->loginLisem();
$crm = new CRMTester($scenario);

$crm->wantTo('Create And Delete Group (Circle)');
$crm->createCircle();
$crm->deleteCircle();
$crm->createCircle();
