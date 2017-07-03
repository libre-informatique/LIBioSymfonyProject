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

use Librinfo\EcommerceBundle\Entity\Product;
use Symfony\Component\Validator\Constraints\NotBlank;
use Blast\CoreBundle\Form\Type\EntityCodeType;
use Blast\CoreBundle\Admin\Traits\EmbeddedAdmin;
use Sonata\CoreBundle\Validator\ErrorElement;

/**
 * Sonata admin for product variants from seeds products.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class SeedsProductVariantEmbeddedAdmin extends SeedsProductVariantAdmin
{
    use EmbeddedAdmin;

    protected $baseRouteName = 'admin_libio_seeds_productvariant_embedded';
    protected $baseRoutePattern = 'libio/seeds_productvariant_embedded';
    protected $classnameLabel = 'SeedsProductVariantEmbedded';

    protected $productAdminCode = 'libio.admin.seeds_product_variant_embedded';

    public function configureFormFields(\Sonata\AdminBundle\Form\FormMapper $mapper)
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
