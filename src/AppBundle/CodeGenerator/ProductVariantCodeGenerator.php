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
use Librinfo\EcommerceBundle\CodeGenerator\ProductVariantCodeGenerator as BaseCodeGenerator;
use Symfony\Component\HttpFoundation\RequestStack;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ProductVariantCodeGenerator extends BaseCodeGenerator
{
    /**
     * @var RequestStack
     */
    private static $requestStack;

    /**
     * @var EntityRepository
     */
    private static $packagingRepo;

    public static function setRequestStack(RequestStack $requestStack)
    {
        self::$requestStack = $requestStack;
    }

    public static function getRequestStack()
    {
        return self::$requestStack;
    }

    public static function setPackagingRepo(EntityRepository $packagingRepo)
    {
        self::$packagingRepo = $packagingRepo;
    }

    public static function getPackagingRepo()
    {
        return self::$packagingRepo;
    }

    /**
     * @param ProductVariant $productVariant
     *
     * @return string
     *
     * @throws InvalidEntityCodeException
     */
    public static function generate($productVariant)
    {
        $request = self::$requestStack;

        if ($productVariant->getSeedBatch() === null || $productVariant->getPackaging() === null) {
            $formName = $request->getCurrentRequest()->get('uniqid', null);

            $seedBatch = $request->getCurrentRequest()->get(sprintf('%s_%s', $formName, 'seedBatch'), null);
            $packaging = $request->getCurrentRequest()->get(sprintf('%s_%s', $formName, 'packaging'), null);

            if ($seedBatch && $packaging) {
                $batch = self::$em->getRepository('LibrinfoSeedBatchBundle:SeedBatch')->find($seedBatch);
                $packaging = self::$packagingRepo->find($packaging);

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

    /**
     * @param string         $code
     * @param ProductVariant $productVariant
     *
     * @return bool
     *
     * @todo   ...
     */
    public static function validate($code, $productVariant = null)
    {
        return true;
    }

    /**
     * @return string
     *
     * @todo   ...
     */
    public static function getHelp()
    {
        return '';
    }
}
