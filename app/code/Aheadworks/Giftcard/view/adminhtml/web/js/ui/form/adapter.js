/**
* Copyright 2019 aheadWorks. All rights reserved.
* See LICENSE.txt for license details.
*/

define([
    'jquery',
    'underscore'
], function ($, _) {
    'use strict';

    var buttons = {
        'reset': '#reset',
        'save': '#save',
        'saveAndContinue': '#save_and_continue',
        'saveAndSend': '#save_and_send'
    };

    /**
     * Initialize listener
     * @param {Function} callback
     * @param {String} action
     */
    function initListener(callback, action) {
        var selector = buttons[action],
            element = $(selector)[0];

        if (element) {
            if (element.onclick) {
                element.onclick = null;
            }
            $(element).off().on('click', callback);
        }
    }

    return {
        /**
         * Calls callback when name event is triggered
         * @param  {Object} handlers
         */
        on: function (handlers) {
            _.each(handlers, initListener);
        }
    };
});
