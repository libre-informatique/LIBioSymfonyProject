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

use Librinfo\EcommerceBundle\Admin\OrderAdmin as BaseOrderAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use AppBundle\Form\Type\OrderAddressType;
use Librinfo\CRMBundle\Entity\Address;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Shipping\Model\ShipmentInterface;
use Sylius\Component\Payment\Model\PaymentInterface;

class OrderAdmin extends BaseOrderAdmin
{
    protected function configureFormFields(FormMapper $mapper)
    {
        parent::configureFormFields($mapper);

        $mapper->add('locale_code', HiddenType::class, [
            'data' => $this->getConfigurationPool()->getContainer()->getParameter('locale'),
        ]);

        $mapper
            ->getFormBuilder()
            ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();
                $formData = $form->getData();

                if (isset($data['shippingAddress']) && isset($data['shippingAddress']['useSameAddressForBilling'])) {
                    if ((bool) $data['shippingAddress']['useSameAddressForBilling'] === true) {
                        $form->remove('billingAddress');
                        $form->add('billingAddress', OrderAddressType::class, [
                            'label'       => false,
                            'data_class'  => Address::class,
                            'mapped'      => false,
                            'constraints' => [],
                            'attr'        => [
                                'class' => 'nested-form',
                            ],
                            'validation_groups' => false,
                        ]);

                        $data['billingAddress'] = $data['shippingAddress'];
                        unset($data['billingAddress']['useSameAddressForBilling']);

                        $billingData = $formData->getBillingAddress();
                        foreach ($data['billingAddress'] as $field => $bData) {
                            try {
                                $propertyAccessor = new PropertyAccessor();
                                $propertyAccessor->setValue($billingData, $field, $bData);
                            } catch (NoSuchPropertyException $e) {
                            }
                        }

                        $formData->setBillingAddress($billingData);

                        $form->setData($formData);

                        $event->setData($data);
                    }
                }
            });
    }

    public function getNewInstance()
    {
        $object = parent::getNewInstance();
        $factory = $this->getConfigurationPool()->getContainer()->get('sylius.factory.address');
        $object->setShippingAddress($factory->createNew());
        $object->setBillingAddress($factory->createNew());

        return $object;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        /** @var Librinfo\EcommerceBundle\Entity\Order $order */
        $order = $object;

        parent::prePersist($order);

        // Check http://docs.sylius.org/en/latest/book/orders/orders.html

        // @TODO: Add order shipment form and traitment
        //
        // /** @var ShipmentInterface $shipment */
        // $shipment = $this->container->get('sylius.factory.shipment')->createNew();
        //
        // $shipment->setMethod($this->container->get('sylius.repository.shipping_method')->findOneBy(['code' => 'UPS']));
        //
        // $order->addShipment($shipment);
        //
        // $this->container->get('sylius.order_processing.order_processor')->process($order);
        //
        // $stateMachineFactory = $this->container->get('sm.factory');
        //
        // $stateMachine = $stateMachineFactory->get($order, OrderShippingTransitions::GRAPH);
        // $stateMachine->apply(OrderShippingTransitions::TRANSITION_REQUEST_SHIPPING);

        // @TODO: Add order payment form and traitment
        //
        // /** @var PaymentInterface $payment */
        // $payment = $this->container->get('sylius.factory.payment')->createNew();
        //
        // $payment->setMethod($this->container->get('sylius.repository.payment_method')->findOneBy(['code' => 'offline']));
        //
        // $payment->setCurrencyCode($currencyCode);
        //
        // $order->addPayment($payment);
        //
        // $stateMachineFactory = $this->container->get('sm.factory');
        //
        // $stateMachine = $stateMachineFactory->get($order, OrderPaymentTransitions::GRAPH);
        // $stateMachine->apply(OrderPaymentTransitions::TRANSITION_REQUEST_PAYMENT);

        $order->setState(OrderInterface::STATE_NEW);
        $order->setShippingState(ShipmentInterface::STATE_READY);
        $order->setPaymentState(PaymentInterface::STATE_NEW);

        // @TODO: May be not usefull
        // $this->container->get('sylius.manager.order')->flush();
    }
}
