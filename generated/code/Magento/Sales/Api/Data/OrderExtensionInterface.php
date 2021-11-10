<?php
namespace Magento\Sales\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Sales\Api\Data\OrderInterface
 */
interface OrderExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return \Magento\Sales\Api\Data\ShippingAssignmentInterface[]|null
     */
    public function getShippingAssignments();

    /**
     * @param \Magento\Sales\Api\Data\ShippingAssignmentInterface[] $shippingAssignments
     * @return $this
     */
    public function setShippingAssignments($shippingAssignments);

    /**
     * @return \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[]|null
     */
    public function getPaymentAdditionalInfo();

    /**
     * @param \Magento\Payment\Api\Data\PaymentAdditionalInfoInterface[] $paymentAdditionalInfo
     * @return $this
     */
    public function setPaymentAdditionalInfo($paymentAdditionalInfo);

    /**
     * @return \Magento\GiftMessage\Api\Data\MessageInterface|null
     */
    public function getGiftMessage();

    /**
     * @param \Magento\GiftMessage\Api\Data\MessageInterface $giftMessage
     * @return $this
     */
    public function setGiftMessage(\Magento\GiftMessage\Api\Data\MessageInterface $giftMessage);

    /**
     * @return string|null
     */
    public function getPickupLocationCode();

    /**
     * @param string $pickupLocationCode
     * @return $this
     */
    public function setPickupLocationCode($pickupLocationCode);

    /**
     * @return int|null
     */
    public function getNotificationSent();

    /**
     * @param int $notificationSent
     * @return $this
     */
    public function setNotificationSent($notificationSent);

    /**
     * @return int|null
     */
    public function getSendNotification();

    /**
     * @param int $sendNotification
     * @return $this
     */
    public function setSendNotification($sendNotification);

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[]|null
     */
    public function getAppliedTaxes();

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsAppliedTaxInterface[] $appliedTaxes
     * @return $this
     */
    public function setAppliedTaxes($appliedTaxes);

    /**
     * @return \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[]|null
     */
    public function getItemAppliedTaxes();

    /**
     * @param \Magento\Tax\Api\Data\OrderTaxDetailsItemInterface[] $itemAppliedTaxes
     * @return $this
     */
    public function setItemAppliedTaxes($itemAppliedTaxes);

    /**
     * @return boolean|null
     */
    public function getConvertingFromQuote();

    /**
     * @param boolean $convertingFromQuote
     * @return $this
     */
    public function setConvertingFromQuote($convertingFromQuote);

    /**
     * @return float|null
     */
    public function getAwGiftcardAmount();

    /**
     * @param float $awGiftcardAmount
     * @return $this
     */
    public function setAwGiftcardAmount($awGiftcardAmount);

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardAmount();

    /**
     * @param float $baseAwGiftcardAmount
     * @return $this
     */
    public function setBaseAwGiftcardAmount($baseAwGiftcardAmount);

    /**
     * @return float|null
     */
    public function getAwGiftcardInvoiced();

    /**
     * @param float $awGiftcardInvoiced
     * @return $this
     */
    public function setAwGiftcardInvoiced($awGiftcardInvoiced);

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardInvoiced();

    /**
     * @param float $baseAwGiftcardInvoiced
     * @return $this
     */
    public function setBaseAwGiftcardInvoiced($baseAwGiftcardInvoiced);

    /**
     * @return float|null
     */
    public function getAwGiftcardRefunded();

    /**
     * @param float $awGiftcardRefunded
     * @return $this
     */
    public function setAwGiftcardRefunded($awGiftcardRefunded);

    /**
     * @return float|null
     */
    public function getBaseAwGiftcardRefunded();

    /**
     * @param float $baseAwGiftcardRefunded
     * @return $this
     */
    public function setBaseAwGiftcardRefunded($baseAwGiftcardRefunded);

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\OrderInterface[]|null
     */
    public function getAwGiftcardCodes();

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\OrderInterface[] $awGiftcardCodes
     * @return $this
     */
    public function setAwGiftcardCodes($awGiftcardCodes);

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\InvoiceInterface[]|null
     */
    public function getAwGiftcardCodesInvoiced();

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\InvoiceInterface[] $awGiftcardCodesInvoiced
     * @return $this
     */
    public function setAwGiftcardCodesInvoiced($awGiftcardCodesInvoiced);

    /**
     * @return \Aheadworks\Giftcard\Api\Data\Giftcard\CreditmemoInterface[]|null
     */
    public function getAwGiftcardCodesRefunded();

    /**
     * @param \Aheadworks\Giftcard\Api\Data\Giftcard\CreditmemoInterface[] $awGiftcardCodesRefunded
     * @return $this
     */
    public function setAwGiftcardCodesRefunded($awGiftcardCodesRefunded);

    /**
     * @return \Amazon\Payment\Api\Data\OrderLinkInterface|null
     */
    public function getAmazonOrderReferenceId();

    /**
     * @param \Amazon\Payment\Api\Data\OrderLinkInterface $amazonOrderReferenceId
     * @return $this
     */
    public function setAmazonOrderReferenceId(\Amazon\Payment\Api\Data\OrderLinkInterface $amazonOrderReferenceId);
}
