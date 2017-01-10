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
     * @return string
     */
    public function getPackaging()
    {
        return $this->getAttributeByCode('_libio_packaging')->getValue();
    }

    /**
     * @param string $packaging
     * @return SeedsProduct
     */
    public function setPackaging($packaging)
    {
        $this->getAttributeByCode('_libio_packaging')->setValue($packaging);
        return $this;
    }

    /**
     * @return int   Price in cents
     */
    public function getPrice()
    {
        return $this->getAttributeByCode('_libio_base_price')->getValue();
    }

    /**
     * @param int $price    Price in cents
     * @return SeedsProduct
     */
    public function setPrice($price)
    {
        $this->getAttributeByCode('_libio_base_price')->setValue($price);
        return $this;
    }
}