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

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
trait ProductExtension
{
    use \Librinfo\VarietiesBundle\Entity\OuterExtension\HasVariety;

    public static $PACKAGING_OPTION_CODE = '_lisem_packaging';

    /**
     * @param string $optionCode
     *
     * @return bool
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
     * @return bool
     */
    public function hasPackagingOption()
    {
        return $this->hasOptionByCode(self::$PACKAGING_OPTION_CODE);
    }
}
