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

use Doctrine\Common\Collections\ArrayCollection;
use Librinfo\EcommerceBundle\Entity\ProductOptionValue;
use Librinfo\EcommerceBundle\Entity\Product;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
trait ProductVariantExtension
{
    // TODO: temporarily removed because it conflicts with Sylius AdminUser
    // use \Librinfo\SonataSyliusUserBundle\Entity\Traits\Traceable;

    use \Librinfo\SeedBatchBundle\Entity\OuterExtension\HasSeedBatch;

    /**
     * @param string $optionCode
     *
     * @return ArrayCollection
     */
    public function getOptionValuesByCode($optionCode)
    {
        return $this->optionValues->filter(
            function ($optionValue) use ($optionCode) {
                return $optionValue->getOptionCode() == $optionCode;
            }
        );
    }

    /**
     * @return ProductOptionValue|null
     */
    public function getPackaging()
    {
        $optionValue = $this->getOptionValuesByCode(Product::$PACKAGING_OPTION_CODE)->first();

        return $optionValue ? $optionValue : null;
    }

    /**
     * @param ProductOptionValue $packaging
     *
     * @return self
     */
    public function setPackaging(ProductOptionValue $packaging)
    {
        if ($packaging->getOptionCode() != Product::$PACKAGING_OPTION_CODE) {
            throw new \UnexpectedValueException(sprintf('The argument passed to Product::setPackaging should have optionCode = %s', Product::$PACKAGING_OPTION_CODE));
        }
        foreach ($this->getOptionValuesByCode(Product::$PACKAGING_OPTION_CODE) as $optionValue) {
            $this->removeOptionValue($optionValue);
        }
        $this->addOptionValue($packaging);

        return $this;
    }
}
