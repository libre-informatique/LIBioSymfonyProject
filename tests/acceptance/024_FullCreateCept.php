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

// @group scenarii
// @group variety
// @group seedbatch

use Step\Acceptance\Variety as VarietyTester;
use Step\Acceptance\Lisem as LisemTester;
use Step\Acceptance\SeedBatch as SeedBatchTester;

$lisem = new LisemTester($scenario);
$variety = new VarietyTester($scenario);
$seedbatch = new SeedBatchTester($scenario);

$lisem->loginLisem();

// Variety Test
$selVariety = $variety->fullCreate();

// SeedBatch Test
$selSeedBatch = $seedbatch->fullCreate($selVariety);


//$seedbatch->create('sel-7700-variety', '2823', 'sel-7382-plot');
