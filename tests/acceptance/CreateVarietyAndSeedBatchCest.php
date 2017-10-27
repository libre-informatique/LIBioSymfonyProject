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

use Step\Acceptance\Lisem as LisemTester;
use Step\Acceptance\Variety as VarietyTester;
use Step\Acceptance\SeedBatch as SeedBatchTester;

class CreateVarietyAndSeedBatchCest
{
    /* Variety Var */
    protected $selFamily;
    protected $selGenus;
    protected $selPlantCat;
    protected $selSpecies;
    protected $selVariety;

    /* SeedBatch Var */
    protected $selSeedBatch;
    protected $selProducer;
    protected $selPlot;

    /* Ah Ah always Needed */
    public function testLogin(LisemTester $lisem)
    {
        $lisem->loginLisem();
        $lisem->hideSymfonyToolBar();
    }

    /**
     * @depends testLogin
     */
    public function testFamily(LisemTester $lisem, VarietyTester $variety)
    {
        $lisem->loginLisem();
        $this->selFamily = $variety->createFamily();
    }

    /**
     * @depends testLogin
     * @depends testFamily
     */
    public function testGenus(LisemTester $lisem, VarietyTester $variety)
    {
        $lisem->loginLisem();
        $this->selGenus = $variety->createGenus($this->selFamily);
    }

    /**
     * @depends testLogin
     */
    public function testPlantCategory(LisemTester $lisem, VarietyTester $variety)
    {
        $lisem->loginLisem();
        $this->selPlantCat = $variety->createPlantCategory();
    }

    /**
     * @depends testLogin
     * @depends testGenus
     * @depends testPlantCategory
     */
    public function testSpecies(LisemTester $lisem, VarietyTester $variety)
    {
        $lisem->loginLisem();
        $this->selSpecies = $variety->createSpecies($this->selGenus, $this->selPlantCat);
    }

    /**
     * @depends testLogin
     * @depends testSpecies
     * @depends testPlantCategory
     */
    public function testVariety(LisemTester $lisem, VarietyTester $variety)
    {
        $lisem->loginLisem();
        $this->selVariety = $variety->createVariety($this->selSpecies, $this->selPlantCat);
    }

    /**
     * @depends testLogin
     */
    public function testProducter(LisemTester $lisem, SeedBatchTester $seedbatch)
    {
        $lisem->loginLisem();
        $this->selProducer = $seedbatch->createProducer();
        //warning we replace producer name because search box for it does not work well with sel-1234
        $this->selProducer = $seedbatch->getRandNbr();
    }

    /**
     * @depends testLogin
     * @depends testProducter
     */
    public function testPlot(LisemTester $lisem, SeedBatchTester $seedbatch)
    {
        $lisem->loginLisem();
        $this->selPlot = $seedbatch->createPlot($this->selProducer);
    }

    /**
     * @depends testLogin
     * @depends testProducter
     * @depends testPlot
     * @depends testVariety
     */
    public function testSeedBatch(LisemTester $lisem, SeedBatchTester $seedbatch)
    {
        $lisem->loginLisem();
        $this->selSeedBatch = $seedbatch->createSeedBatch($this->selVariety, $this->selProducer, $this->selPlot);
    }
}
