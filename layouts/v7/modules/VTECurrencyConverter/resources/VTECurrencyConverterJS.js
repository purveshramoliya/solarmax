/* ********************************************************************************
 * The content of this file is subject to the VTE Currency Converter ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/** @class VTECurrencyConverterJS */
Vtiger.Class("VTECurrencyConverterJS", {}, {
    MODULE: 'VTECurrencyConverter',

    /**
     * Use encodeURIComponent to encode characters outside of the Latin1 range
     * @link http://stackoverflow.com/questions/23223718/failed-to-execute-btoa-on-window-the-string-to-be-encoded-contains-characte
     * @param string
     * @returns {string}
     */
    base64Encode: function (string) {
        if (typeof string === 'undefined' || string === null) {
            return '';
        }

        return window.btoa(unescape(encodeURIComponent(string)));
    },

    /**
     * Use encodeURIComponent to encode characters outside of the Latin1 range
     * @link http://stackoverflow.com/questions/23223718/failed-to-execute-btoa-on-window-the-string-to-be-encoded-contains-characte
     * @param string
     * @returns {string}
     */
    base64Decode: function (string) {
        if (typeof string === 'undefined' || string === null) {
            return '';
        }

        return decodeURIComponent(escape(window.atob(string)));
    },

    /**
     * @param data
     * @param objResult
     */
    convert: function (data, objResult) {
        // Get values in the first
        var newData = data.split("&");
        var input = newData[3].split("=")[1];
        var from = newData[4].split("=")[1];
        var to = newData[5].split("=")[1];
        var meta = newData[6].split("=")[1];
        var url = 'index.php?module=VTECurrencyConverter&action=ActionAjax&mode=gConvert';
        var actionParams = {
            "type":"POST",
            "url":url,
            "dataType":"html",
            "data" : {
                a : input,
                from : from,
                to : to,
                meta : meta
            }
        };

        app.request.post(actionParams).then(
            function (err, data) {
                if (err === null) {
                    if(data){
                        var result = data;
                        var content = result['content'];
                        var tmp = window.atob(content);
                        if (!tmp) {
                            app.helper.showErrorNotification({
                                type: 'error',
                                message: app.vtranslate('Invalid form content')
                            });
                        }

                        var doc = $(tmp);
                        var form = doc.find('form').clone();
                        var objConvertedResult = form.find('#currency_converter_result');
                        objResult.text(objConvertedResult.text().trim());
                    }else {
                        app.helper.showErrorNotification({
                            type: 'error',
                            message: 'error'
                        });
                    }
                } else {
                    console.log(err);
                }
            }
        );
    },

    registerWidgetButtons: function () {
        var thisInstance = this;

        var actionsContainer = jQuery('#appnav');
        var quickActions = actionsContainer.find('.quickActions');
        var commonActionsButtonContainer = quickActions.find('.commonActionsButtonContainer');

        var params = {
            "module": thisInstance.MODULE,
            'action': 'ActionAjax',
            'mode': 'gForm'
        };

        app.request.post({data: params}).then(
            function (err, data) {
                if (err === null) {
                    if(data){
                        var result = data;
                        var content = result['content'];
                        var tmp = window.atob(content);

                        if (!tmp) {
                            app.helper.showErrorNotification({
                                type: 'error',
                                message: app.vtranslate('Invalid form content')
                            });
                        }

                        var doc = $(tmp);
                        var form = doc.find('form').clone();

                        // Custom form
                        form.attr('id', 'google-converter-form');
                        form.attr('action', 'index.php');
                        form.prepend('<input type="hidden" name="module" value="' + thisInstance.MODULE + '" />' +
                            '<input type="hidden" name="action" value="ActionAjax" />' +
                            '<input type="hidden" name="mode" value="gConvert" />');

                        // Apply bootstrap style
                        form.find('select').addClass('select2');
                        form.find('input[type="submit"]').addClass('btn').addClass('btn-primary');

                        var currencyConverterContainer = $('<div class="pull-right commonActionsButtonContainer" style="margin: 10px">' +
                            '<div class="btn-group dropdown currency_converter-dropdown">' +
                            '<a href="javascript:;" class="dropdown-toggle">' +
                            '<img src="layouts/vlayout/modules/VTECurrencyConverter/resources/favicon.png" class="alignMiddle vte_currency_converter-icon" alt="VTE Currency Converter" title="VTE Currency Converter">' +
                            '</a>' +
                            '<ul class="dropdown-menu currency_converter-dropdown-menu">' +
                            '<li class="vte_currency_converter-container">' +
                            '<div class="row-fluid">' +
                            '<div class="span12">' +
                            form[0].outerHTML +
                            '</div>' +
                            '</div>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '</div>');
                        // Append to DOM
                        actionsContainer.prepend(currencyConverterContainer);
                        var realForm = actionsContainer.find('form#google-converter-form');
                        var realConvertedResult = realForm.find('#currency_converter_result');
                        realConvertedResult.append('<div class="currency_converter_result_text">&nbsp;</div>');
                        var realConvertedResultText = realForm.find('.currency_converter_result_text');

                        // // Apply select2
                        // app.showSelect2ElementView(realForm.find('select.select2'));

                        realForm.on('submit', function (event) {
                            event.preventDefault();

                            var thisFocus = $(this);

                            thisInstance.convert(thisFocus.serialize(), realConvertedResultText);
                        });

                        /**
                         * @link http://stackoverflow.com/questions/25089297/twitter-bootstrap-avoid-dropdown-menu-close-on-click-inside#25196101
                         */
                        $('.dropdown.currency_converter-dropdown a').on('click', function () {
                            $(this).parent().toggleClass("open");
                        });

                        $('body').on('click', function (e) {
                            var dropdownContainer = $('.dropdown.currency_converter-dropdown');
                            if (!dropdownContainer.is(e.target) && dropdownContainer.has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
                                dropdownContainer.removeClass('open');
                            }
                        });
                    }else {
                        app.helper.showErrorNotification({
                            type: 'error',
                            message: 'error'
                        });
                    }
                } else {
                    console.log(err);
                }
            }
        );

    },

    registerEvents: function () {
        var thisInstance = this;
        thisInstance.registerWidgetButtons();
    }
});

jQuery(document).ready(function () {
    var instance = new VTECurrencyConverterJS();
    instance.registerEvents();
});
