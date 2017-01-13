<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\ProductBundle\Admin\ProductVariantAdmin;

/**
 * Sonata admin for product variants from seeds products
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductVariantAdmin extends ProductVariantAdmin
{
    protected $baseRouteName = 'admin_libio_seeds_productvariant';
    protected $baseRoutePattern = 'libio/seeds_productvariant';
    protected $classnameLabel = 'SeedsProductVariant';

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->leftJoin("$alias.product", "prod");
        $query->andWhere(
            $query->expr()->isNotNull("prod.variety")
        );
        return $query;
    }

}