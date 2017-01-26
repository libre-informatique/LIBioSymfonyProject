<?php
/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\CodeGenerator;

use Blast\CoreBundle\Exception\InvalidEntityCodeException;
use Librinfo\EcommerceBundle\Entity\ProductVariant;
use Librinfo\EcommerceBundle\CodeGenerator\ProductVariantCodeGenerator as BaseCodeGenerator;

class ProductVariantCodeGenerator extends BaseCodeGenerator
{
    /**
     * @param  ProductVariant $productVariant
     * @return string
     * @throws InvalidEntityCodeException
     */
    public static function generate($productVariant)
    {
        if (!$seedBatch = $productVariant->getSeedBatch())
            throw new InvalidEntityCodeException('librinfo.error.missing_seed_batch');
        if (!$seedBatchCode = $seedBatch->getCode())
            throw new InvalidEntityCodeException('librinfo.error.missing_seed_batch_code');

        if (!$packaging = $productVariant->getPackaging())
            throw new InvalidEntityCodeException('librinfo.error.missing_packaging');
        if (!$packagingCode = $packaging->getCode())
            throw new InvalidEntityCodeException('librinfo.error.missing_packaging_code');

        return sprintf('%s-%s', $seedBatchCode, $packagingCode);
    }

    /**
     * @param  string         $code
     * @param  ProductVariant $productVariant
     * @return boolean
     * @todo   ...
     */
    public static function validate($code, $productVariant = null)
    {
        return true;
    }

    /**
     * @return string
     * @todo   ...
     */
    public static function getHelp()
    {
        return "";
    }
}