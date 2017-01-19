<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity\OuterExtension\LibrinfoProductBundle;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
trait ProductExtension
{
    use \Librinfo\VarietiesBundle\Entity\OuterExtension\HasVariety;

    public static $PACKAGING_OPTION_CODE = "_libio_packaging";

    /**
     * @param string $optionCode
     * @return boolean
     */
    public function hasOptionByCode($optionCode)
    {
        foreach ($this->options as $option) {
            if ($option->getCode() === $optionCode) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return boolean
     */
    public function hasPackagingOption()
    {
        return $this->hasOptionByCode(self::$PACKAGING_OPTION_CODE);
    }
}