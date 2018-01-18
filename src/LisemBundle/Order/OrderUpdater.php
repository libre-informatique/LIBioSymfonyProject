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

namespace LisemBundle\Order;

use Sil\Bundle\EcommerceBundle\Services\OrderUpdater as BaseOrderUpdater;
use Sil\Bundle\EcommerceBundle\Entity\OrderInterface;
use Sil\Bundle\EcommerceBundle\Entity\ProductVariantInterface;
use LisemBundle\Entity\SilEcommerceBundle\Product;

class OrderUpdater extends BaseOrderUpdater
{
    /**
     * @param string $orderId
     * @param string $variantId
     */
    public function addProduct($orderId, $variantId)
    {
        //Retrieve order
        $order = $this->em
            ->getRepository(OrderInterface::class)
            ->find($orderId);

        $orderStateMachine = $this->smFactory->get($order, 'sylius_order');

        if ($orderStateMachine->getState() === 'cancelled' || $orderStateMachine->getState() === 'fulfilled') {
            $item = null;
        } else {
            //Retrieve product variant
            /** @var ProductVariant $variant * */
            $variant = $this->em
                ->getRepository(ProductVariantInterface::class)
                ->find($variantId);

            $optionCode = $variant->getOptionValues()->first() ? $variant->getOptionValues()->first()->getOption()->getCode() : false;
            $optionValue = $variant->getOptionValues()->first() ? $variant->getOptionValues()->first()->getCode() : false;

            $isBulk = ($optionCode === Product::$PACKAGING_OPTION_CODE && $optionValue === 'BULK');

            //Create new OrderItem
            $item = $this->orderItemFactory->createNew();
            $item->setVariant($variant);
            $item->setOrder($order);
            $item->setBulk($isBulk);

            if ($isBulk) {
                $item->setquantity(999);
            }

            $item->setUnitPrice(
                $variant->getchannelPricingForChannel($this->channel)->getPrice()
            );

            //Create OrderItemUnit from OrderItem
            $this->orderItemUnitFactory->createForItem($item);

            // //Recalculate Order totals
            // $item->recalculateUnitsTotal();
            // $order->recalculateItemstotal();

            $order->getPayments()->clear(); // Avoid payement duplicates

            $this->orderProcessor->process($order);

            //Persist Order
            $this->em->persist($order);
            $this->em->flush();
        }

        return [
            'item'   => $item,
            'object' => $order,
        ];
    }
}
