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

namespace VarietyBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class SpeciesCodeTransformer implements DataTransformerInterface
{
    /**
     * @param string|null $code
     *
     * @return string|null
     */
    public function transform($code)
    {
        return $code;
    }

    /**
     * @param string|null $code
     *
     * @return string|null
     */
    public function reverseTransform($code)
    {
        return strtoupper(trim($code));
    }
}
