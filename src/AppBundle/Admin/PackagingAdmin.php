<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\EcommerceBundle\Admin\ProductOptionValueAdmin;
use Librinfo\EcommerceBundle\Entity\Product;

/**
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class PackagingAdmin extends ProductOptionValueAdmin
{
    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->leftJoin($query->getRootAlias() . '.option', 'option')
            ->andWhere('option.code = :code')
            ->setParameter('code', Product::PACKAGING_OPTION_CODE)
        ;
        return $query;
    }

}