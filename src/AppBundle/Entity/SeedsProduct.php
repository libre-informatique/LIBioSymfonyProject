<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Librinfo\ProductBundle\Entity\Product;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProduct extends Product
{
    /**
     * @return integer
     */
    public function getWeight()
    {
        return (int)$this->getAttributeByCode('_libio_weight')->getValue();
    }

    public function setWeight($weight)
    {
        $this->getAttributeByCode('_libio_weight')->setValue((int)$weight);
        return $this;
    }
}