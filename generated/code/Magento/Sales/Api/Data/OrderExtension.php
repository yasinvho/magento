<?php
namespace Magento\Sales\Api\Data;

/**
 * Extension class for @see \Magento\Sales\Api\Data\OrderInterface
 */
class OrderExtension extends \Magento\Framework\Api\AbstractSimpleObject implements OrderExtensionInterface
{
    /**
     * @return \Magento\Sales\Api\Data\ShippingAssignmentInterface[]|null
     */
    public function getShippingAssignments()
    {
        return $this->_get('shipping_assignments');
    }

    /**
     * @param \Magento\Sales\Api\Data\ShippingAssignmentInterface[] $shippingAssignments
     * @return $this
     */
    public function setShippingAssignments($shippingAssignments)
    {
        $this->setData('shipping_assignments', $shippingAssignments);
        return $this;
    }

    /**
     * @return \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[]|null
     */
    public function getPaymentAdditionalInfo()
    {
        return $this->_get('payment_additional_info');
    }

    /**
     * @param \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[] $paymentAdditionalInfo
     * @return $this
     */
    public function setPaymentAdditionalInfo($paymentAdditionalInfo)
    {
        $this->setData('payment_additional_info', $paymentAdditionalInfo);
        return $this;
    }

    /**
     * @return \Magento\GiftMessage\Api\Data\MessageInterface|null
     */
    public function getGiftMessage()
    {
        return $this->_get('gift_message');
    }

    /**
     * @param \Magento\GiftMessage\Api\Data\MessageInterface $giftMessage
     * @return $this
     */
    public function setGiftMessage(\Magento\GiftMessage\Api\Data\MessageInterface $giftMessage)
    {
        $this->setData('gift_message', $giftMessage);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPickupLocationCode()
    {
        return $this->_get('pickup_location_code');
    }

    /**
     * @param string $pickupLocationCode
     * @return $this
     */
    public function setPickupLocationCode($pickupLocationCode)
    {
        $this->setData('pickup_location_code', $pickupLocationCode);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotificationSent()
    {
        return $this->_get('notification_sent');
    }

    /**
     * @param int $notificationSent
     * @return $this
     */
    public function setNotificationSent($notificationSent)
    {
        $this->setData('notification_sent', $notificationSent);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendNotification()
    {
        return $this->_get('send_notification');
    }

    /**
     * @param int $sendNotification
     * @return $this
     */
    public function setSendNotification($sendNotification)
    {
        $this->setData('send_notification', $sendNotification);
        return $this;
    }

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[]|null
     */
    public function getAppliedTaxes()
    {
        return $this->_get('applied_taxes');
    }

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[] $appliedTaxes
     * @return $this
     */
    public function setAppliedTaxes($appliedTaxes)
    {
        $this->setData('applied_taxes', $appliedTaxes);
        return $this;
    }

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[]|null
     */
    public function getItemAppliedTaxes()
    {
        return $this->_get('item_applied_taxes');
    }

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[] $itemAppliedTaxes
     * @return $this
     */
    public function setItemAppliedTaxes($itemAppliedTaxes)
    {
        $this->setData('item_applied_taxes', $itemAppliedTaxes);
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getConvertingFromQuote()
    {
        return $this->_get('converting_from_quote');
    }

    /**
     * @param boolean $convertingFromQuote
     * @return $this
     */
    public function setConvertingFromQuote($convertingFromQuote)
    {
        $this->setData('converting_from_quote', $convertingFromQuote);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAwGiftcardAmount()
    {
        return $this->_get('aw_giftcard_amount');
    }

    /**
     * @param float $awGiftcardAmount
     * @return $this
     */
    public function setAwGiftcardAmount($awGiftcardAmount)
    {
        $this->setData('aw_giftcard_amount', $awGiftcardAmount);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardAmount()
    {
        return $this->_get('base_aw_giftcard_amount');
    }

    /**
     * @param float $baseAwGiftcardAmount
     * @return $this
     */
    public function setBaseAwGiftcardAmount($baseAwGiftcardAmount)
    {
        $this->setData('base_aw_giftcard_amount', $baseAwGiftcardAmount);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAwGiftcardInvoiced()
    {
        return $this->_get('aw_giftcard_invoiced');
    }

    /**
     * @param float $awGiftcardInvoiced
     * @return $this
     */
    public function setAwGiftcardInvoiced($awGiftcardInvoiced)
    {
        $this->setData('aw_giftcard_invoiced', $awGiftcardInvoiced);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardInvoiced()
    {
        return $this->_get('base_aw_giftcard_invoiced');
    }

    /**
     * @param float $baseAwGiftcardInvoiced
     * @return $this
     */
    public function setBaseAwGiftcardInvoiced($baseAwGiftcardInvoiced)
    {
        $this->setData('base_aw_giftcard_invoiced', $baseAwGiftcardInvoiced);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAwGiftcardRefunded()
    {
        return $this->_get('aw_giftcard_refunded');
    }

    /**
     * @param float $awGiftcardRefunded
     * @return $this
     */
    public function setAwGiftcardRefunded($awGiftcardRefunded)
    {
        $this->setData('aw_giftcard_refunded', $awGiftcardRefunded);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardRefunded()
    {
        return $this->_get('base_aw_giftcard_refunded');
    }

    /**
     * @param float $baseAwGiftcardRefunded
     * @return $this
     */
    public function setBaseAwGiftcardRefunded($baseAwGiftcardRefunded)
    {
        $this->setData('base_aw_giftcard_refunded', $baseAwGiftcardRefunded);
        return $this;
    }

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\OrderInterface[]|null
     */
    public function getAwGiftcardCodes()
    {
        return $this->_get('aw_giftcard_codes');
    }

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\OrderInterface[] $awGiftcardCodes
     * @return $this
     */
    public function setAwGiftcardCodes($awGiftcardCodes)
    {
        $this->setData('aw_giftcard_codes', $awGiftcardCodes);
        return $this;
    }

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\InvoiceInterface[]|null
     */
    public function getAwGiftcardCodesInvoiced()
    {
        return $this->_get('aw_giftcard_codes_invoiced');
    }

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\InvoiceInterface[] $awGiftcardCodesInvoiced
     * @return $this
     */
    public function setAwGiftcardCodesInvoiced($awGiftcardCodesInvoiced)
    {
        $this->setData('aw_giftcard_codes_invoiced', $awGiftcardCodesInvoiced);
        return $this;
    }

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\CreditmemoInterface[]|null
     */
    public function getAwGiftcardCodesRefunded()
    {
        return $this->_get('aw_giftcard_codes_refunded');
    }

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\CreditmemoInterface[] $awGiftcardCodesRefunded
     * @return $this
     */
    public function setAwGiftcardCodesRefunded($awGiftcardCodesRefunded)
    {
        $this->setData('aw_giftcard_codes_refunded', $awGiftcardCodesRefunded);
        return $this;
    }

    /**
     * @return \Amazon\Payment\Api\Data\OrderLinkInterface|null
     */
    public function getAmazonOrderReferenceId()
    {
        return $this->_get('amazon_order_reference_id');
    }

    /**
     * @param \Amazon\Payment\Api\Data\OrderLinkInterface $amazonOrderReferenceId
     * @return $this
     */
    public function setAmazonOrderReferenceId(\Amazon\Payment\Api\Data\OrderLinkInterface $amazonOrderReferenceId)
    {
        $this->setData('amazon_order_reference_id', $amazonOrderReferenceId);
        return $this;
    }
}
