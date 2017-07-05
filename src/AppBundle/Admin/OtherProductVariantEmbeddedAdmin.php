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

namespace AppBundle\Admin;

/**
 * Sonata admin for product variants from non-seed products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class OtherProductVariantEmbeddedAdmin extends OtherProductVariantAdmin
{
    protected $baseRouteName = 'admin_libio_other_productvariant_embedded';
    protected $baseRoutePattern = 'libio/other_productvariant_embedded';
    protected $classnameLabel = 'OtherProductVariant';

    protected $productAdminCode = 'libio.admin.other_product_embedded';
}
