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

use Librinfo\EcommerceBundle\Admin\PaymentMethodAdmin as BasePaymentMethodAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Librinfo\SyliusPayboxBundle\Form\Type\PayboxGatewayConfigurationType;

class PaymentMethodAdmin extends BasePaymentMethodAdmin
{
    /**
     * @param FormMapper $mapper
     */
    protected function configureFormFields(FormMapper $mapper)
    {
        parent::configureFormFields($mapper);

        $mapper->add('gatewayConfig.config', PayboxGatewayConfigurationType::class, [
            'label' => 'lisem.appbundle.gateway_config'
        ]);
    }
}
