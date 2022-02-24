/*******************************************************************************
 * The content of this file is subject to the ITS4YouCreator license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ***************************************************************************** */

Vtiger_Index_Js('Settings_ITS4YouCreator_Index_Js', {

}, {
    updateModuleStatus: function(tabid, mode) {
        let message = app.vtranslate('JS_UPDATE_FIELD'),
            params = {
                data: {
                    module: 'ITS4YouCreator',
                    parent: 'Settings',
                    action: 'Index',
                    tabid: tabid,
                    mode: mode,
                }
            };

        app.request.post(params).then(function(error, data) {

            if(error === null) {
                if(data.message) {
                    message = data.message;
                }

                app.helper.showSuccessNotification({message: message});
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
});