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

namespace AppBundle\Entity\OuterExtension\LibrinfoEcommerceBundle;

use Sil\Bundle\SeedBatchBundle\Entity\Association\HasSeedBatchesTrait;
use Sil\Bundle\EcommerceBundle\Entity\ProductOptionValue as BaseProductOptionValue;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
trait ProductOptionValueExtension
{
    use HasSeedBatchesTrait;

    /**
     * @return bool
     */
    public function isPackaging()
    {
        return $this->option && $this->option->getCode() == Product::$PACKAGING_OPTION_CODE;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        $match = [];
        if ($this->isPackaging() && preg_match('/^([0-9]+)(G|S)$/', $this->code, $match)) {
            return (int) $match[1];
        }

        return 0;
    }

    /**
     * @return string "grams"|"seeds"|""
     */
    public function getUnit()
    {
        $match = [];
        if ($this->isPackaging() && preg_match('/^([0-9]+)(G|S)$/', $this->code, $match)) {
            return $match[2] == 'S' ? 'seeds' : 'grams';
        }

        return '';
    }

    /**
     * @return bool
     */
    public function isBulk()
    {
        return $this->isPackaging() && $this->code == 'BULK';
    }
}
