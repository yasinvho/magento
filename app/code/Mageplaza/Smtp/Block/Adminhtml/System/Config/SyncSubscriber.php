<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_Smtp
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\Smtp\Block\Adminhtml\System\Config;

/**
 * Class SyncSubscriber
 * @package Mageplaza\Smtp\Block\Adminhtml\System\Config
 */
class SyncSubscriber extends Button
{
    /**
     * @var string
     */
    protected $_template = 'system/config/sync-template.phtml';

    /**
     * @return string
     */
    public function getEstimateUrl()
    {
        return $this->getUrl('adminhtml/smtp_sync/estimatesubscriber', ['_current' => true]);
    }

    /**
     * @return mixed
     */
    public function getWebsiteId()
    {
        return $this->getRequest()->getParam('website');
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->getRequest()->getParam('store');
    }

    /**
     * @return mixed
     */
    public function getSyncSuccessMessage()
    {
        return __('Subscriber synchronization has been completed.');
    }

    /**
     * @return string
     */
    public function getElementId()
    {
        return 'mp-sync-subscriber';
    }

    /**
     * @return string
     */
    public function getComponent()
    {
        return 'Mageplaza_Smtp/js/sync/subscriber';
    }

    /**
     * @return bool
     */
    public function isRenderCss()
    {
        return true;
    }
}
