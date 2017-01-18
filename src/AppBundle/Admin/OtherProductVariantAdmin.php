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
 * Sonata admin for product variants from non-seed products
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class OtherProductVariantAdmin extends ProductVariantAdmin
{
    protected $baseRouteName = 'admin_libio_other_productvariant';
    protected $baseRoutePattern = 'libio/other_productvariant';
    protected $classnameLabel = 'OtherProductVariant';

    protected $productAdminCode = 'libio.admin.other_product';

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $alias = $query->getRootAliases()[0];
        $query->leftJoin("$alias.product", "prod");
        $query->andWhere(
            $query->expr()->isNull("prod.variety")
        );
        return $query;
    }

}