/*******************************************************************************
 * The content of this file is subject to the ITS4YouCreator license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ***************************************************************************** */

let Settings_ITS4YouCreator_Index_View_Js = {

    updateModuleStatus: function(tabid, mode) {
        let message = app.vtranslate('JS_UPDATE_FIELD'),
            params = {
                module: 'ITS4YouCreator',
                parent: 'Settings',
                action: 'Index',
                tabid: tabid,
                mode: mode,
            };

        AppConnector.request(params).then(function(error, data) {

            if(error === null) {
                data = data.result;

                if(data.message) {
                    message = data.message;
                }

                Vtiger_Helper_Js.showPnotify({type: 'success', title: message});
            }
        });
    },
    registerClickEvent: function() {
        let self = this;

        jQuery('.its4you_creator_checkbox').live('click', function() {
            let thisCheckbox = jQuery(this),
                data = thisCheckbox.data(),
                checked = thisCheckbox.attr('checked'),
                mode = 'Hide';

            if(checked === 'checked') {
                mode = 'Show';
            }

            self.updateModuleStatus(data.tabid, mode);
        });
    },
    init: function() {
        let self = this;

        self.registerClickEvent();
    }
};

jQuery(document).ready(function() {
    Settings_ITS4YouCreator_Index_View_Js.init()
});