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

// @group login

use Step\Acceptance\Lisem as LisemTester;

$lisem = new LisemTester($scenario);
$lisem->loginLisem();
