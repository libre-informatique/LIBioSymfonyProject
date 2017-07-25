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

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Extension for Sonata Admin sidebar menu.
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 *
 * @todo Put this in LibrinfoUIBundle
 */
class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
        // ... add more children

        return $menu;
    }

    /**
     * App settings sidebar menu.
     *
     * @param RequestStack $requestStack
     *
     * @return type
     *
     * @todo Import YML description instead of hardcoded menus
     */
    public function createParametersSidebarMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('libio.menu_label.app_settings');

        // Admin settings
        $submenu = $menu->addChild('libio.menu_label.admin_settings');
        // TODO (we are not using LibrinfoUserBundle any more. Adapt this for SonataSyliusUserBundle) :
        //$submenu->addChild('libio.menu_label.user_users', ['route' => 'admin_librinfo_user_user_list']);
        //$submenu->addChild('libio.menu_label.user_groups', ['route' => 'admin_librinfo_user_group_list']);
        //$submenu->addChild('libio.menu_label.user_roles', ['route' => 'libio_not_implemented']);

        // CRM settings
        $submenu = $menu->addChild('libio.menu_label.crm_settings');
        $submenu->addChild('libio.menu_label.crm_circles_list', ['route' => 'admin_librinfo_crm_circle_list']);
        $submenu->addChild('libio.menu_label.crm_categories_list', ['route' => 'admin_librinfo_crm_category_list']);
        $submenu->addChild('libio.menu_label.position_types_list', ['route' => 'admin_librinfo_crm_positiontype_list']);
        // $submenu->addChild('libio.menu_label.phone_types_list', ['route' => 'admin_librinfo_crm_phonetype_list']);

        // Varieties settings
        $submenu = $menu->addChild('libio.menu_label.varieties_settings');
        $submenu->addChild('libio.menu_label.genuses_list', ['route' => 'admin_librinfo_varieties_genus_list']);
        $submenu->addChild('libio.menu_label.families_list', ['route' => 'admin_librinfo_varieties_family_list']);
        $submenu->addChild('libio.menu_label.plant_categories_list', ['route' => 'admin_librinfo_varieties_plantcategory_list']);

        // Seed batches settings
        $submenu = $menu->addChild('libio.menu_label.seed_batches_settings');
        $submenu->addChild('libio.menu_label.certifications_list', ['route' => 'admin_librinfo_seedbatch_certificationtype_list']);
        $submenu->addChild('libio.menu_label.certificators_list', ['route' => 'admin_librinfo_seedbatch_certifyingbody_list']);

        // Shop settings
        $submenu = $menu->addChild('libio.menu_label.shop_settings');
        $submenu->addChild('libio.menu_label.channels_list', ['route' => 'libio_not_implemented']);
        $submenu->addChild('libio.menu_label.taxon_list', ['route' => 'admin_librinfo_ecommerce_taxon_list']);
        $submenu->addChild('libio.menu_label.product_attributes', ['route' => 'admin_librinfo_ecommerce_productattribute_list']);
        $submenu->addChild('libio.menu_label.product_options', ['route' => 'admin_librinfo_ecommerce_productoption_list']);
        $submenu->addChild('libio.menu_label.rates_list', ['route' => 'libio_not_implemented']);
        $submenu->addChild('libio.menu_label.zones_list', ['route' => 'admin_librinfo_ecommerce_zone_list']);
        $submenu->addChild('libio.menu_label.customer_group', ['route' => 'admin_librinfo_ecommerce_customergroup_list']);
        $submenu->addChild('libio.menu_label.payment_methods_list', ['route' => 'admin_librinfo_ecommerce_payment_method_list']);
        $submenu->addChild('libio.menu_label.shipping_methods_list', ['route' => 'libio_not_implemented']);
        $submenu->addChild('libio.menu_label.tax_categories_list', ['route' => 'admin_librinfo_ecommerce_taxcategory_list']);
        $submenu->addChild('libio.menu_label.tax_rates_list', ['route' => 'admin_librinfo_ecommerce_taxrate_list']);


        return $menu;
    }
}
