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

namespace LisemBundle\Admin;

use Sil\Bundle\EcommerceBundle\Entity\Product;
use Blast\Bundle\CoreBundle\Admin\Traits\EmbeddedAdmin;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Sonata admin for product variants from seeds products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductVariantEmbeddedAdmin extends SeedsProductVariantAdmin
{
    use EmbeddedAdmin;

    protected $baseRouteName = 'admin_seed_product_variant_embedded';
    protected $baseRoutePattern = 'seed_product_variant_embedded';

    protected $classnameLabel = 'SeedsProductVariantEmbedded';

    protected $productAdminCode = 'lisem.admin.seeds_product_variant_embedded';

    public function configureFormFields(FormMapper $mapper)
    {
        parent::configureFormFields($mapper);
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('seedBatch')
                ->assertNotBlank()
            ->end()
        ;
    }
}
