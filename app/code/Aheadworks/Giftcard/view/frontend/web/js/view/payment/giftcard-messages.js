/**
* Copyright 2019 aheadWorks. All rights reserved.
* See LICENSE.txt for license details.
*/

define([
    'Magento_Ui/js/view/messages',
    '../../model/payment/giftcard-messages'
], function (Component, messageContainer) {
    'use strict';
    return Component.extend({
        /**
         * Initialize component
         * 
         * @return {Object}
         */
        initialize: function (config) {
            return this._super(config, messageContainer);
        }
    });
});
