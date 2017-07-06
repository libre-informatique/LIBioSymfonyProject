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

namespace AppBundle\CodeGenerator;

use Blast\CoreBundle\Exception\InvalidEntityCodeException;
use Librinfo\EcommerceBundle\Entity\ProductVariant;

class SeedsProductVariantEmbeddedCodeGenerator extends ProductVariantCodeGenerator
{
    /**
     * @param ProductVariant $productVariant
     *
     * @return string
     *
     * @throws InvalidEntityCodeException
     */
    public static function generate($productVariant)
    {
        $request = self::getRequestStack();

        if ($productVariant->getSeedBatch() === null || $productVariant->getPackaging() === null) {
            $formName = $request->getCurrentRequest()->query->get('puniqid', null);
            $formData = $request->getCurrentRequest()->request->get($formName, null);

            $caller = $request->getCurrentRequest()->request->get('caller', null);
            $re = '/^'.$formName.'\[variants\]\[([0-9]*)\]\[code\]/';

            preg_match($re, $caller, $callerIndex);

            $callerIndex = (int) $callerIndex[1];

            $variantData = $formData['variants'][$callerIndex];

            $seedBatch = $variantData['seedBatch'];
            $packaging = $variantData['packaging'];

            if ($seedBatch && $packaging) {
                $batch = self::$em->getRepository('LibrinfoSeedBatchBundle:SeedBatch')->find($seedBatch);
                $packaging = self::getPackagingRepo()->find($packaging);

                return sprintf('%s-%s', $batch->getCode(), $packaging->getCode());
            }
        }

        if (!$seedBatch = $productVariant->getSeedBatch()) {
            throw new InvalidEntityCodeException('librinfo.error.missing_seed_batch');
        }
        if (!$seedBatchCode = $seedBatch->getCode()) {
            throw new InvalidEntityCodeException('librinfo.error.missing_seed_batch_code');
        }
        if (!$packaging = $productVariant->getPackaging()) {
            throw new InvalidEntityCodeException('librinfo.error.missing_packaging');
        }
        if (!$packagingCode = $packaging->getCode()) {
            throw new InvalidEntityCodeException('librinfo.error.missing_packaging_code');
        }
        return sprintf('%s-%s', $seedBatchCode, $packagingCode);
    }
}
