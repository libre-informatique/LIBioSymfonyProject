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

namespace Step\Acceptance;

class SeedBatch extends Lisem
{
    public function createPlot($producerName)
    {
        $plotName = $this->getRandName() . '-plot';

        $this->amGoingTo('Create Plot ' . $plotName);
        $this->amOnPage('/lisem/librinfo/seedbatch/plot/create');
        $this->fillField("//input[contains(@id,'_name')]", $plotName);
        $this->selectSearchDrop('_producer_autocomplete_input', $producerName);
        $this->fillField("//input[contains(@id,'_city')]", $plotName . '-city');
        $this->fillField("//input[contains(@id,'_zip')]", $this->getRandNbr());
        $this->generateCode();
        $this->clickCreate();
        $this->waitForText('succès', 30); // secs
        return $plotName;
    }

    /* @todo add a test for organism (not individual) */
    public function createProducer()
    {
        $producerName = $this->getRandName() . '-producer';

        $this->amGoingTo('Create a producer ' . $producerName);
        $this->amOnPage('/lisem/librinfo/seedbatch/seed-producer/create');
        //$this->click("//li[2]/div/label/div/ins"); //ugly work
        /* @todo: find a way to click without use li[2] ... */
        $this->click("//ul[contains(@id, '_isIndividual')]/li[2]/div/label/div/ins"); //ugly too
        $this->selectDrop('_title', 'Mme');
        $this->fillField("//input[contains(@id,'_firstname')]", $producerName);
        $this->fillField("//input[contains(@id,'_lastname')]", 'last-' . $producerName);
        $this->fillField("//input[contains(@id,'_email')]", $producerName . '@lisem.eu');
        $this->clickCreate();
        $this->waitForText('succès', 30); // secs
        return $producerName;
    }

    public function createSeedBatch($varietyName, $producerName, $plotName)
    {
        $seedBatchName = $this->getRandName() . '-seedbatch';

        $this->amGoingTo('Create Seed Batch' . $seedBatchName);
        $this->amOnPage('lisem/librinfo/seedbatch/seedbatch/create');
        $this->selectSearchDrop('_variety_autocomplete_input', $varietyName);
        $this->selectSearchDrop('_producer_autocomplete_input', $producerName);
        $this->fillField("//input[contains(@id,'_productionYear')]", '1913');
        $this->fillField("//input[contains(@id,'_batchNumber')]", 1 + $this->getRandNbr() % 99);
        $this->selectSearchDrop('_plot_autocomplete_input', $plotName);
        $this->fillField("//textarea[contains(@id,'description')]", $seedBatchName . '-desc');
        $this->scrollUp(); // code generator is on top of page
        $this->generateCode();
        $this->clickCreate();
        $this->waitForText('succès', 30); // secs
        return $seedBatchName;
    }
}
