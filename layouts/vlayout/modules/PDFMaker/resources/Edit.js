/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
Vtiger_Edit_Js("PDFMaker_Edit_Js",{

    duplicateCheckCache : {},
    advanceFilterInstance : false,
    formElement : false,

    getForm : function(){
        if(this.formElement == false){
                this.setForm(jQuery('#EditView'));
        }
        return this.formElement;
    },
    setForm : function(element){
        this.formElement = element;
        return this;
    },    
    checkDuplicateTemplateName : function(params){        
	var aDeferred = jQuery.Deferred();	
        AppConnector.request(params).then(
                function(data) {
                        var response = data['result'];
                        var result = response['success'];
                        if(result == true) {
                                aDeferred.reject(response);
                        } else {
                                aDeferred.resolve(response);
                        }
                },
                function(error,err){
                        aDeferred.reject();
                }
        );
        return aDeferred.promise();
    },    
    calculateValues : function(){
        if(this.advanceFilterInstance) {
            var advfilterlist = this.advanceFilterInstance.getValues();
            jQuery('#advanced_filter').val(JSON.stringify(advfilterlist));
        }
    },
    registerRecordPreSaveEvent : function(form){
        var thisInstance = this;
        if(typeof form == 'undefined'){
                form = this.getForm();
        }

        form.on(Vtiger_Edit_Js.recordPreSave, function(e, data){

            var template_name =jQuery("#filename").val();
            var template_id = jQuery("#templateid").val();
            var error = 0;
            if (template_name == ""){
                alert(app.vtranslate("LBL_PDF_NAME") + app.vtranslate('CANNOT_BE_EMPTY'));
                error++;
            }
            var pdf_module = jQuery("#modulename").val();
            if (pdf_module == ""){
                blocktypeElement = jQuery("#blocktype");
                if (blocktypeElement.length == 0) {
                    alert(app.vtranslate("LBL_MODULE_ERROR"));
                    error++;
                }
            }
            if (!PDFMaker_EditJs.ControlNumber('margin_top', true) || !PDFMaker_EditJs.ControlNumber('margin_bottom', true) || !PDFMaker_EditJs.ControlNumber('margin_left', true) || !PDFMaker_EditJs.ControlNumber('margin_right', true)){
                error++;
            }
            if (!PDFMaker_EditJs.CheckCustomFormat()){
                error++;
            }
            if (!PDFMaker_EditJs.CheckSharing()){
                error++;
            }
            if (error == 0){       
                moduleName = app.getModuleName();

                var params = {
                'module' : moduleName,
                'action' : "IndexAjax",
                'mode' : "CheckDuplicateTemplateName",
                'templatename' : template_name,
                'templateid' : template_id
                }

                if(!(template_name in thisInstance.duplicateCheckCache)){
                    thisInstance.checkDuplicateTemplateName(params).then(
                        function(data){
                            thisInstance.duplicateCheckCache[template_name] = data['success'];
                            form.submit();
                        },
                        function(data, err){
                            var message = app.vtranslate('LBL_DUPLICATE_TEMPLATE_CREATION_CONFIRMATION');
                                Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                                    function(e){
                                        thisInstance.duplicateCheckCache[template_name] = false;
                                        form.submit();
                                    },
                                    function(error, err) {
                                    }
                                );
                        }
                    );
                } else {
                    if(thisInstance.duplicateCheckCache[template_name] == true){
                            var message = app.vtranslate('LBL_DUPLICATE_TEMPLATE_CREATION_CONFIRMATION');
                            Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                                    function(e) {
                                            thisInstance.duplicateCheckCache[template_name] = false;
                                            form.submit();
                                    },
                                    function(error, err) {

                                    }
                            );
                    } else {
                            delete thisInstance.duplicateCheckCache[template_name];
                            return true;
                    }
                }
            } 
            e.preventDefault();
        })
    },    
    registerBasicEvents: function(container){
        this._super(container);
        this.registerRecordPreSaveEvent();
        this.registerButtons(container);
    },
    registerButtons: function(container) {
        var thisInstance = this;
        var selectElement1 = jQuery('.InsertIntoTemplate');
        selectElement1.on('click', function() {
            var selectedType = jQuery(this).data('type');
            thisInstance.InsertIntoTemplate(selectedType,false);
        });
        var selectElement2 = jQuery('.InsertLIntoTemplate');
        selectElement2.on('click', function() {
            var selectedType = jQuery(this).data('type');
            thisInstance.InsertIntoTemplate(selectedType,true);
        });
        var selectElement3 = jQuery('.InsertIconIntoTemplate');
        selectElement3.on('click', function() {
            var oEditor = thisInstance.getSelectedEditor();
            var selecticon = jQuery("#fontawesomeicons").val();

            if (selecticon != "") {
                selecticon = String.fromCodePoint('0x'+selecticon);
                oEditor.insertHtml('<i class="fa">' + selecticon + '</i>');
                oEditor.insertHtml(' ');
            }
        });
        var selectElement = container.find('[name="fontawesomeicons"]');
        thisInstance.setAwesomeIcon(selectElement);

        selectElement.on('change', function(e) {

            var currentElement = jQuery(e.currentTarget);
            thisInstance.setAwesomeIcon(currentElement);
        });
    },
    setAwesomeIcon : function(element) {
        var selectedOption = element.find('option:selected');
        var selecticon = selectedOption.val();

        var fontawesomepreview = jQuery('#fontawesomepreview');
        selecticon = String.fromCodePoint('0x'+selecticon);
        fontawesomepreview.html(selecticon);
    },
    getSelectedEditor : function() {

        var selectedTab2 = jQuery('#ContentEditorTabs').find('.active').data('type');

        if (typeof selectedTab2 == "undefined") selectedTab2 = "body";

        if (selectedTab2 == "body")
            var oEditor = CKEDITOR.instances.body;
        else if (selectedTab2 == "header")
            var oEditor = CKEDITOR.instances.header_body;
        else if (selectedTab2 == "footer")
            var oEditor = CKEDITOR.instances.footer_body;

        return oEditor;
    },

    InsertIntoTemplate: function(element,islabel){
        var thisInstance = this;

        selectField = document.getElementById(element).value;
        if (selectField == ""){
            return;
        }

        var oEditor = thisInstance.getSelectedEditor();

        if (element == "relatedmodulefields") {
            selectField = 'R_' + selectField;
        }

        if (islabel){
            oEditor.insertHtml('%' + selectField + '%');
        } else {
            if (element != 'header_var' && element != 'footer_var' && element != 'hmodulefields' && element != 'fmodulefields' && element != 'dateval'){
                if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
                    insert_value = '{$COMPANY_STAMP_SIGNATURE}';
                else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
                    insert_value = '{$COMPANY_HEADER_SIGNATURE}';
                else if (selectField == 'VATBLOCK')
                    insert_value = '{$VATBLOCK_TABLE}';
                else {
                    if (element == "articelvar" || selectField == "LISTVIEWBLOCK_START" || selectField == "LISTVIEWBLOCK_END")
                        insert_value = '#' + selectField + '#';
                    else if (element == "productbloctpl" || element == "productbloctpl2")
                        insert_value = selectField;
                    else if (element == "global_lang")
                        insert_value = '%G_' + selectField + '%';
                    else if (element == "module_lang")
                        insert_value = '%M_' + selectField + '%';
                    else if (element == "custom_lang")
                        insert_value = '%' + selectField + '%';
                    else if (element == "barcodeval")
                        insert_value = '[BARCODE|' + selectField + '=YOURCODE|BARCODE]';
                    else if (element == "customfunction")
                        insert_value = '[CUSTOMFUNCTION|' + selectField + '|CUSTOMFUNCTION]';
                    else
                        insert_value = '$' + selectField + '$';
                }
                oEditor.insertHtml(insert_value);
            } else {
                if (element == 'hmodulefields' || element == 'fmodulefields'){
                    oEditor.insertHtml('$' + selectField + '$');
                } else {
                    oEditor.insertHtml(selectField);
                }
            }
        }
    },
    registerSelectWatermarkTypeOption : function(editViewForm) {
        var thisInstance = this;
        var selectElement = editViewForm.find('[name="watermark_type"]');
        selectElement.on('change', function(e) {
            var currentElement = jQuery(e.currentTarget);
            var selectedOption = currentElement.find('option:selected');
            var watermarktype = selectedOption.val();

            var watermarkImageTrElement = jQuery('#watermark_image_tr');
            if (watermarktype == "image") {
                watermarkImageTrElement.removeClass('hide');
            } else {
                watermarkImageTrElement.addClass('hide');
            }

            var watermarkTextTrElement = jQuery('#watermark_text_tr');
            if (watermarktype == "text") {
                watermarkTextTrElement.removeClass('hide');
            } else {
                watermarkTextTrElement.addClass('hide');
            }

            var watermarkAlphaTrElement = jQuery('#watermark_alpha_tr');
            if (watermarktype == "none") {
                watermarkAlphaTrElement.addClass('hide');
            } else {
                watermarkAlphaTrElement.removeClass('hide');
            }
        });

        var deleteWatermarkFileElement = editViewForm.find('.deleteWatermarkFile');
        deleteWatermarkFileElement.on('click', function() {

            editViewForm.find('[name="watermark_img_id"]').val('');

            jQuery('#uploadedWatermarkFileImage').removeClass('hide');
            jQuery('#uploadedWatermarkFileName').addClass('hide');

        });
    },
    registerSubmitEvent: function(){
        var thisInstance = this;
        var editViewForm = this.getForm();

        editViewForm.submit(function(e){

            //Form should submit only once for multiple clicks also
            if(typeof editViewForm.data('submit') != "undefined"){
                    return false;
            } else {
                thisInstance.calculateValues();
                editViewForm.data('submit', 'true');
                //on submit form trigger the recordPreSave event
                var recordPreSaveEvent = jQuery.Event(Vtiger_Edit_Js.recordPreSave);
                editViewForm.trigger(recordPreSaveEvent, {'value' : 'edit'});
                if(recordPreSaveEvent.isDefaultPrevented()) {
                        //If duplicate record validation fails, form should submit again
                        editViewForm.removeData('submit');
                        e.preventDefault();
                }
            }
        });
    },
    
    registerSelectModuleOption : function(content) {
        var thisInstance = this;
        var selectElement = jQuery('[name="modulename"]');
        selectElement.on('change', function() {
            
            if (selected_module != '') {
                question = confirm(app.vtranslate("LBL_CHANGE_MODULE_QUESTION"));
                if (question) {
                    var oEditor = CKEDITOR.instances.body;
                    oEditor.setData("");
                    oEditor = CKEDITOR.instances.header_body;
                    oEditor.setData("");
                    oEditor = CKEDITOR.instances.footer_body;
                    oEditor.setData("");
                    jQuery("#nameOfFile").val('');
                } else {
                    selectElement.val(selected_module);
                    
                    app.destroyChosenElement(selectElement);
                    var formElement = thisInstance.getForm();
                    app.changeSelectElementView(formElement); 
                    return;
                }
            }   
            
            var selectedOption = selectElement.find('option:selected');
            var moduleName = selectedOption.val();

            thisInstance.getFields(content,moduleName,"modulefields","");
            thisInstance.updateModuleConditions(moduleName);
            
            PDFMaker_EditJs.fill_module_lang_array(moduleName);
            PDFMaker_EditJs.fill_related_blocks_array(moduleName);
            PDFMaker_EditJs.fill_module_product_fields_array(moduleName);
            PDFMaker_EditJs.fill_content_blocks_array(moduleName);
        });		
    },
    
    updateModuleConditions : function(moduleName) {
            var params = {
                            module : app.getModuleName(),
                            view : 'IndexAjax',
                            source_module : moduleName,
                            mode : 'getModuleConditions'
            }
            var actionParams = {
                "type": "POST",
                "url": 'index.php',
                "dataType": "html",
                "data": params
            };
            AppConnector.request(actionParams).then(function(data){
                    jQuery('#advanceFilterContainer').html(data);

                    var container = jQuery('#display_div');
                    this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
                    
                    jQuery("#display_tab").show();
            });
    },    
    
    registerSelectRelatedModuleOption : function(content, type) {
        var thisInstance = this;
        var selectElement = content.find('[name="relatedmodulesorce'+type+'"]');
        selectElement.on('change', function() {
            var selectedOption = selectElement.find('option:selected');
            var moduleName = selectedOption.data('module');
            var fieldName = selectedOption.val();

            if (type == "2") {
                moduleName = jQuery('[name="relatedmodulesorce"]').find('option[value="'+fieldName+'"]').data('module');
            }

            thisInstance.getFields(content,moduleName,"relatedmodulefields"+type,fieldName);
        });		
    },
    
    getFields : function(content,moduleName,selectname,fieldName) {
        var thisInstance = this;
        

        var urlParams = {
            "module": "PDFMaker",
            "formodule" : moduleName,
            "forfieldname" : fieldName,
            "action" : "IndexAjax",
            "mode" : "getModuleFields"            
        }

        AppConnector.request(urlParams).then(
            function(data){
                thisInstance.updateFields(content,data,selectname);
            }      
        );
    },
    
    updateFields: function(content,data,selectname){
        var thisInstance = this;
        var response = data['result'];
        var result = response['success'];
        var formElement = this.getForm();
        
        if(result == true) {

            var ModuleFieldsElement = content.find('#'+selectname);
            ModuleFieldsElement.find('option:not([value=""]').remove();
            
            if (selectname == "filename_fields") {
            
                jQuery.each(response['filename_fields'], function (i, fields) {

                    var optgroup = jQuery('<optgroup/>');
                    optgroup.attr('label',i);

                    jQuery.each(fields, function (key, field) {

                        optgroup.append(jQuery('<option>', { 
                            value: key,
                            text : field 
                        }));
                    })

                    ModuleFieldsElement.append(optgroup);
                });                   
            }
            
            
            jQuery.each(response['fields'], function (i, fields) {

                var optgroup = jQuery('<optgroup/>');
                optgroup.attr('label',i);

                jQuery.each(fields, function (key, field) {

                    optgroup.append(jQuery('<option>', { 
                        value: key,
                        text : field 
                    }));
                })

                ModuleFieldsElement.append(optgroup);
            });

            app.destroyChosenElement(ModuleFieldsElement);

            if (selectname == "modulefields") {                        

                var RelatedModuleSourceElement = jQuery('#relatedmodulesorce');
                RelatedModuleSourceElement.find('option:not([value=""]').remove();
                jQuery.each(response['related_modules'], function (i, item) {

                    RelatedModuleSourceElement.append(jQuery('<option>', { 
                        value: item[0],
                        text : item[2] + " (" + item[1] + ")",
                    }).data("module",item[3]));
                });

                app.destroyChosenElement(RelatedModuleSourceElement);
                
                thisInstance.updateFields(content,data,"filename_fields");
            } 

            if (selectname != "filename_fields") app.changeSelectElementView(formElement); 
        }
    },
    registerSelectBlockOption : function() {
        var thisInstance = this;

        jQuery('.blocktypeselect').find("select").each(function(index,Element) {

            var currentElement = jQuery(Element);
            var blocktype = currentElement.data("type");
            var blocktypeElement = jQuery("#blocktype"+blocktype);
            var blocktypeTabElement = jQuery("#"+blocktype+"DivTab");

            var blocktypeElementVal = currentElement.find('option:selected').val();

            if (blocktypeElementVal != "custom") {
                blocktypeTabElement.css("display","none");
            }

            if (blocktypeElement.find('option').length == "0"){
                currentElement.find('option[value="fromlist"]').attr('disabled','disabled');
                app.destroyChosenElement(currentElement);

                var formElement = jQuery('#EditView');
                app.changeSelectElementView(formElement);
            }

            currentElement.on('change', function(e) {

                var selectedOption = currentElement.find('option:selected').val();
                jQuery(".ContentEditorTab").removeClass("active");
                jQuery(".ContentTabPanel").removeClass("active");

                jQuery(".divTabs").removeClass('active');

                if (selectedOption == "custom") {
                    blocktypeElement.css("display","none");
                    blocktypeTabElement.css("display","");

                    blocktypeTabElement.addClass('active');
                    thisInstance.showHideTab3(blocktype);
                } else {
                    blocktypeElement.css("display","");
                    blocktypeTabElement.css("display","none");
                    jQuery("#templateBodyTab").addClass('active');
                    thisInstance.showHideTab3('body');
                    var blocktypeElementList = jQuery("#blocktype"+blocktype+"_list");
                    app.destroyChosenElement(blocktypeElementList);

                    var formElement = jQuery('#EditView');
                    app.changeSelectElementView(formElement);
                }
            });


        });
    },
    showHideTab3: function(tabname){
        var selectedTab2 = jQuery("#selectedTab2").val();
        box = document.getElementById('modulename')
        var module = box.options[box.selectedIndex].value;
        var formerTab = selectedTab2;
        selectedTab2 = tabname;
        jQuery("#selectedTab2").val(selectedTab2);
    },
    getPopUp: function (editViewForm) {
        var thisInstance = this;
        if (typeof editViewForm == 'undefined') {
            editViewForm = thisInstance.getForm();
        }

        var contentDiv = jQuery('.editViewContainer');

        editViewForm.on('click', '.getPopupUi', function (e) {
            var fieldValueElement = jQuery(e.currentTarget);
            var fieldValue = fieldValueElement.val();

            var clonedPopupUi = contentDiv.find('.popupUi').clone(true, true).removeClass('hide').removeClass('popupUi').addClass('clonedPopupUi');

            clonedPopupUi.find('select').addClass('select2');
            clonedPopupUi.find('.fieldValue').val(fieldValue);
            clonedPopupUi.find('.fieldValue').removeClass('hide');

            var callBackFunction = function (data) {
                data.find('.clonedPopupUi').removeClass('hide');

                var module = editViewForm.find('#modulename').val();
                jQuery.each( [ "filename_fields", "relatedmodulesorce", "relatedmodulefields" ], function( i, l ){
                    var modulefields_content = editViewForm.find('[name="'+l+'"]').html();
                    var newSelectElement = data.find('[name="'+l+'2"]');
                    newSelectElement.html(modulefields_content);

                    if (l == "relatedmodulesorce") {
                        var sel = editViewForm.find('[name="'+l+'"]').val();
                        newSelectElement.val(sel).change();
                    }

                    app.destroyChosenElement(newSelectElement);
                });

                app.changeSelectElementView(editViewForm);

                var selectElement2 = data.find('.InsertIntoTextarea');
                selectElement2.on('click', function() {
                    var selectedType = jQuery(this).data('type');
                    thisInstance.InsertIntoTemplate(selectedType,true);

                    var selectField = data.find('[name="'+selectedType+'"]').val();

                    if (selectedType == "relatedmodulefields2") {
                        var insert_value = '$R_' + selectField + '$';
                    } else {
                        var insert_value = '$' + selectField + '$';
                    }

                    var fieldValueVal = data.find('.fieldValue').val();
                    data.find('.fieldValue').val(fieldValueVal+insert_value);
                });


                thisInstance.registerSelectRelatedModuleOption(data,'2');
                thisInstance.registerPopUpSaveEvent(data, fieldValueElement);
                thisInstance.registerRemoveModalEvent(data);
                data.find('.fieldValue').filter(':visible').trigger('focus');
            }

            contentDiv.find('.clonedPopUp').html(clonedPopupUi);

            app.showModalWindow(jQuery('.clonedPopUp', contentDiv).find('.clonedPopupUi'),function(data){
                if(typeof callBackFunction == 'function'){
                    callBackFunction(data);
                }
            });
        });
    },
    registerRemoveModalEvent: function (data) {
        data.on('click', '.closeModal', function (e) {
            data.find('.closeDiv').trigger('click');
        });
    },
    registerPopUpSaveEvent: function (data, fieldValueElement) {
        jQuery('[name="saveButton"]', data).on('click', function (e) {
            var fieldValue = data.find('.fieldValue').filter(':visible').val();
            fieldValueElement.val(fieldValue);
            data.find('.closeDiv').trigger('click');
        });
    },
    registerEvents: function(){

        var editViewForm = this.getForm();
        var statusToProceed = this.proceedRegisterEvents();
        if(!statusToProceed){
                return;
        }

        var container = jQuery('#display_div');
        if (container.length > 0){
            this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
            container.hide();
        }

        this.registerBasicEvents(this.getForm());
        this.registerSelectModuleOption(editViewForm);
        this.registerSelectRelatedModuleOption(editViewForm,'');
        this.registerSelectWatermarkTypeOption(editViewForm);
        this.registerSelectBlockOption();
        this.registerSubmitEvent();

        this.getPopUp(editViewForm);

        if (typeof this.registerLeavePageWithoutSubmit == 'function'){
            this.registerLeavePageWithoutSubmit(editViewForm);
        }             
    }
});
if (typeof(PDFMaker_EditJs) == 'undefined'){
    /*
     * Namespaced javascript class for Import
     */
    PDFMaker_EditJs = {
        reportsColumnsList : false,
        advanceFilterInstance : false,
        availListObj : false,
        selectedColumnsObj : false,
    
        clearRelatedModuleFields: function(){
            second = document.getElementById("relatedmodulefields");
            lgth = second.options.length - 1;
            second.options[lgth] = null;
            if (second.options[lgth])
                optionTest = false;
            if (!optionTest)
                return;
            var box2 = second;
            var optgroups = box2.childNodes;
            for (i = optgroups.length - 1; i >= 0; i--){
                box2.removeChild(optgroups[i]);
            }

            objOption = document.createElement("option");
            objOption.innerHTML = app.vtranslate("LBL_SELECT_MODULE_FIELD");
            objOption.value = "";
            box2.appendChild(objOption);
        },
        change_relatedmodulesorce: function(first, second_name){
            second = document.getElementById(second_name);
            optionTest = true;
            lgth = second.options.length - 1;
            second.options[lgth] = null;
            if (second.options[lgth])
                optionTest = false;
            if (!optionTest)
                return;
            var box = first;
            var number = box.options[box.selectedIndex].value;
            if (!number)
                return;
            
            var params = {
                            module : app.getModuleName(),
                            view : 'IndexAjax',
                            source_module : number,
                            mode : 'getModuleConditions'
            }
            var actionParams = {
                "type": "POST",
                "url": 'index.php',
                "dataType": "html",
                "data": params
            };
            AppConnector.request(actionParams).then(function(data){
                    jQuery('#advanceFilterContainer').html(data);

                    var container = jQuery('#display_div');
                    this.advanceFilterInstance = Vtiger_AdvanceFilter_Js.getInstance(jQuery('.filterContainer',container));
                    
                    jQuery("#display_tab").show();
            });
            
            var box2 = second;
            var optgroups = box2.childNodes;
            for (i = optgroups.length - 1; i >= 0; i--){
                box2.removeChild(optgroups[i]);
            }

            var list = all_related_modules[number];
            for (i = 0; i < list.length; i += 2){
                objOption = document.createElement("option");
                objOption.innerHTML = list[i];
                objOption.value = list[i + 1];
                box2.appendChild(objOption);
            }

            PDFMaker_EditJs.clearRelatedModuleFields();
        },
        change_relatedmodule: function(first, second_name){
            second = document.getElementById(second_name);
            optionTest = true;
            lgth = second.options.length - 1;
            second.options[lgth] = null;
            if (second.options[lgth])
                optionTest = false;
            if (!optionTest)
                return;
            var box = first;
            var number = box.options[box.selectedIndex].value;
            if (!number)
                return;
            var box2 = second;
            var optgroups = box2.childNodes;
            for (i = optgroups.length - 1; i >= 0; i--){
                box2.removeChild(optgroups[i]);
            }

            if (number == "none"){
                objOption = document.createElement("option");
                objOption.innerHTML = app.vtranslate("LBL_SELECT_MODULE_FIELD");
                objOption.value = "";
                box2.appendChild(objOption);
            } else {
                var tmpArr = number.split('|', 2);
                var moduleName = tmpArr[0];
                number = tmpArr[1];
                var blocks = module_blocks[moduleName];
                for (b = 0; b < blocks.length; b += 2){
                    var list = related_module_fields[moduleName + '|' + blocks[b + 1]];
                    if (list.length > 0){
                        optGroup = document.createElement('optgroup');
                        optGroup.label = blocks[b];
                        box2.appendChild(optGroup);
                        for (i = 0; i < list.length; i += 2){
                            objOption = document.createElement("option");
                            objOption.innerHTML = list[i];
                            var objVal = list[i + 1];
                            var newObjVal = objVal.replace(moduleName.toUpperCase() + '_', number.toUpperCase() + '_');
                            objOption.value = newObjVal;
                            optGroup.appendChild(objOption);
                        }
                    }
                }
            }
        },
        change_acc_info: function(element){            
            jQuery('.au_info_div').css('display','none');            
            switch (element.value){
                case "Assigned":
                    var div_name = 'user_info_div';
                    break;
                case "Logged":
                    var div_name = 'logged_user_info_div';
                    break;
                case "Modifiedby":
                    var div_name = 'modifiedby_user_info_div';
                    break; 
                case "Creator":
                    var div_name = 'smcreator_user_info_div';
                    break; 
                default:
                    var div_name = 'user_info_div';
                    break;
            }            
            jQuery('#'+div_name).css('display','inline');

            var selectElement = jQuery('#'+div_name).find('.chzn-select');
            app.destroyChosenElement(selectElement);
            var formElement = jQuery('#EditView');
            app.changeSelectElementView(formElement);

        },
        savePDF: function(form){
            var template_name = document.getElementById("filename").value;
            var template_id = document.getElementById("templateid").value;
            var error = 0;
            if (template_name == ""){
                alert(app.vtranslate("LBL_PDF_NAME") + app.vtranslate('CANNOT_BE_EMPTY'));
                error++;
            }
            var pdf_module = document.getElementById("modulename").value;
            if (pdf_module == ""){
                blocktypeElement = document.getElementById("blocktype");
                if (blocktypeElement.length == 0) {
                    alert(app.vtranslate("LBL_MODULE_ERROR"));
                    error++;
                }
            }
            if (!PDFMaker_EditJs.ControlNumber('margin_top', true) || !PDFMaker_EditJs.ControlNumber('margin_bottom', true) || !PDFMaker_EditJs.ControlNumber('margin_left', true) || !PDFMaker_EditJs.ControlNumber('margin_right', true)){
                error++;
            }
            if (!PDFMaker_EditJs.CheckCustomFormat()){
                error++;
            }
            if (!PDFMaker_EditJs.CheckSharing()){
                error++;
            }
            if (error == 0){
		moduleName = app.getModuleName();

		var params = {
		'module' : moduleName,
		'action' : "IndexAjax",
                'mode' : "CheckDuplicateTemplateName",
		'templatename' : template_name,
		'templateid' : template_id
		}
		AppConnector.request(params).then(
                    function(data) {
                        var response = data['result'];
                        var result = response['success'];
                        if(result == true) {
                            form.submit();
                        } else {
                            var message = app.vtranslate('LBL_DUPLICATE_TEMPLATE_CREATION_CONFIRMATION');
                            Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                                function(e) {
                                    form.submit();
                                },
                                function(error, err) {
                                }
                            );
                        }
                    },
                    function(error,err){
                        form.submit();
                    }
		);
            }
        },
        ControlNumber: function(elid, final){
            var control_number = document.getElementById(elid).value;
            var re = new Array();
            re[1] = new RegExp("^([0-9])");
            re[2] = new RegExp("^[0-9]{1}[.]$");
            re[3] = new RegExp("^[0-9]{1}[.][0-9]{1}$");
            if (control_number.length > 3 || !re[control_number.length].test(control_number) || (final == true && control_number.length == 2)){
                alert(app.vtranslate("LBL_MARGIN_ERROR"));
                document.getElementById(elid).focus();
                return false;
            } else {
                return true;
            }
        },
        showHideTab: function(tabname){
            var selectedTab = jQuery("#selectedTab").val();
            jQuery('#' + selectedTab + '_tab').removeClass("active");
            jQuery('#' + tabname + '_tab').addClass("active");            
            jQuery('#' + selectedTab + '_div').hide();

            var divElement = jQuery('#' + tabname + '_div');
            divElement.show();
            divElement.find("select").each(function(index,Element) {

                var currentElement = jQuery(Element);
                app.destroyChosenElement(currentElement);
            });
            var formerTab = selectedTab;
            var selectedTab = tabname;
            jQuery("#selectedTab").val(selectedTab);      
            var formElement = jQuery('#EditView');
            app.changeSelectElementView(formElement);             
        },
        showHideTab2: function(tabname){
            var selectedTab2 = jQuery("#selectedTab2").val();
            document.getElementById(selectedTab2 + '_tab2').className = "dvtUnSelectedCell";
            document.getElementById(tabname + '_tab2').className = 'dvtSelectedCell';
            if (tabname == 'body'){
                document.getElementById('body_variables').style.display = '';
                document.getElementById('related_block_tpl_row').style.display = '';
                document.getElementById('listview_block_tpl_row').style.display = '';
                if (document.getElementById('headerfooter_div').style.display == 'block')
                    PDFMaker_EditJs.showHideTab('properties');
            } else {
                document.getElementById('header_variables').style.display = '';
                document.getElementById('body_variables').style.display = 'none';
                document.getElementById('related_block_tpl_row').style.display = 'none';
                document.getElementById('listview_block_tpl_row').style.display = 'none';
                if (document.getElementById('headerfooter_div').style.display == 'none')
                    PDFMaker_EditJs.showHideTab('headerfooter');
            }
            document.getElementById(selectedTab2 + '_div2').style.display = 'none';
            document.getElementById(tabname + '_div2').style.display = 'block';
            box = document.getElementById('modulename')
            var module = box.options[box.selectedIndex].value;
            var formerTab = selectedTab2;
            selectedTab2 = tabname;
            jQuery("#selectedTab2").val(selectedTab2);
        },
        showHideTab3: function(tabname){
            var selectedTab2 = jQuery("#selectedTab2").val();
            box = document.getElementById('modulename')
            var module = box.options[box.selectedIndex].value;
            var formerTab = selectedTab2;
            selectedTab2 = tabname;
            jQuery("#selectedTab2").val(selectedTab2);
        },
        fill_module_lang_array: function(module, selected){
            
            var urlParams = {
                "module" : "PDFMaker",
                "handler" : "fill_lang",
                "action" : "AjaxRequestHandle",
                "langmod" : module            
            }

            AppConnector.request(urlParams).then(function(data){
                var response = data['result'];
                var result = response['success'];

                if(result == true) {    
                    var moduleLangElement = jQuery('#module_lang');
                    moduleLangElement.find('option:not([value=""]').remove();
                    app.destroyChosenElement(moduleLangElement);
                    jQuery.each(response['labels'], function (key, langlabel) {     
                         moduleLangElement.append(jQuery('<option>', { 
                                    value: key,
                                    text : langlabel
                        }));
                    })

                    var formElement = jQuery('#EditView');
                    app.changeSelectElementView(formElement); 
                }
            })
        },
        fill_related_blocks_array: function(module, selected){            
            var urlParams = {
                "module" : "PDFMaker",
                "handler" : "fill_relblocks",
                "action" : "AjaxRequestHandle",
                "selmod" : module            
            }
            AppConnector.request(urlParams).then(function(data){
                var response = data['result'];
                var result = response['success'];
                if(result == true) {    
                    var relatedBlockElement = jQuery('#related_block');
                    relatedBlockElement.find('option:not([value=""]').remove();
                    app.destroyChosenElement(relatedBlockElement);
                    jQuery.each(response['relblocks'], function (key, blockname) {
     
                        if (selected != undefined && key == selected) {
                            var is_selected = true;
                        } else {
                            var is_selected = false;
                        }
                        relatedBlockElement.append(jQuery('<option>', { 
                                    value: key,
                                    text : blockname
                        }).attr("selected",is_selected));
                    })

                    var formElement = jQuery('#EditView');
                    app.changeSelectElementView(formElement); 
                }
            })
        },
        fill_module_product_fields_array: function(module){
            var ajax_url = 'index.php?module=PDFMaker&action=AjaxRequestHandle&handler=fill_module_product_fields&productmod=' + module;
            jQuery.ajax(ajax_url).success(function(response){

                var product_fields = document.getElementById('psfields');
                product_fields.length = 0;
                var map = response.split('|@|');
                var keys = map[0].split('||');
                var values = map[1].split('||');
                for (i = 0; i < values.length; i++){
                    var item = document.createElement('option');
                    item.text = values[i];
                    item.value = keys[i];
                    try {
                        product_fields.add(item, null);
                    } catch (ex){
                        product_fields.add(item);
                    }
                }
            }).error(function(){
                alert('fill_module_product_fields_array error');
            });
        },
        fill_content_blocks_array: function(module){
            var thisInstance = this;

            var urlParams = {
                "module" : "PDFMaker",
                "mode" : "fillContentBlockLists",
                "action" : "IndexAjax",
                "selmod" : module
            }
            AppConnector.request(urlParams).then(function(data){
                var response = data['result'];
                var result = response['success'];
                if(result == true) {
                    if(result == true) {
                        thisInstance.fill_block_list('header',response['header']);
                        thisInstance.fill_block_list('footer',response['footer']);
                    }
                }
            });
        },
        fill_block_list: function(type, data){
            var thisInstance = this;
            var blockListElement = jQuery('#blocktype'+type+'_list');
            var selected = blockListElement.find('option:selected').val();
            if (typeof selected == 'undefined') selected = '';
            blockListElement.empty();
            var fromListElement = jQuery('#blocktype'+type+'_val');
            var fromListElementVal = fromListElement.find('option[value="fromlist"]');
            var count = 0;
            jQuery.each(data, function(i,v) { count++; });

            if (count > 0) {
                jQuery.each(data, function (key, blockname) {
                    if (key == selected) {
                        var is_selected = true;
                    } else {
                        var is_selected = false;
                    }

                    blockListElement.append(jQuery('<option>', {
                        value: key,
                        text : blockname
                    }).attr("selected",is_selected));
                })
                fromListElementVal.removeAttr('disabled');
            } else {
                fromListElementVal.attr('disabled','disabled');
                jQuery('#blocktype'+type).css('display','none');
                jQuery('#'+type+'DivTab').css('display','');
            }
            app.destroyChosenElement(fromListElement);
            app.destroyChosenElement(blockListElement);
            var formElement = jQuery('#EditView');
            app.changeSelectElementView(formElement);
        },
        refresh_related_blocks_array: function(selected){
            var module = document.getElementById('modulename').value;
            PDFMaker_EditJs.fill_related_blocks_array(module, selected);
        },
        InsertRelatedBlock: function(){
            var relblockid = document.getElementById('related_block').value;
            if (relblockid == '')
                return false;
            var oEditor = CKEDITOR.instances.body;
            var ajax_url = 'index.php?module=PDFMaker&action=AjaxRequestHandle&handler=get_relblock&relblockid=' + relblockid;
            jQuery.ajax(ajax_url).success(function(response){
                oEditor.insertHtml(response);
            }).error(function(){
                alert('InsertRelatedBlock error');
            });
        },
        EditRelatedBlock: function(){
            var relblockid = document.getElementById('related_block').value;
            if (relblockid == ''){
                alert(app.vtranslate('LBL_SELECT_RELBLOCK'));
                return false;
            }

            var popup_url = 'index.php?module=PDFMaker&view=EditRelatedBlock&record=' + relblockid;
            window.open(popup_url, "Editblock", "width=1230,height=700,scrollbars=yes");
        },
        CreateRelatedBlock: function(){
            var pdf_module = document.getElementById("modulename").value;
            if (pdf_module == ''){
                alert(app.vtranslate("LBL_MODULE_ERROR"));
                return false;
            }
            var popup_url = 'index.php?module=PDFMaker&view=EditRelatedBlock&pdfmodule=' + pdf_module;
            window.open(popup_url, "Editblock", "width=1230,height=700,scrollbars=yes");
        },
        DeleteRelatedBlock: function(){
            var relblockid = document.getElementById('related_block').value;
            var result = false;
            if (relblockid == ''){
                alert(app.vtranslate('LBL_SELECT_RELBLOCK'));
                return false;
            } else {
                result = confirm(app.vtranslate('LBL_DELETE_RELBLOCK_CONFIRM') + " " + jQuery("#related_block option:selected").text());
            }

            if (result){
                var ajax_url = 'index.php?module=PDFMaker&action=AjaxRequestHandle&handler=delete_relblock&relblockid=' + relblockid;
                jQuery.ajax(ajax_url).success(function(){
                    PDFMaker_EditJs.refresh_related_blocks_array();
                }).error(function(){
                    alert('DeleteRelatedBlock error');
                });
            }
        },
        insertFieldIntoFilename: function(val){
            if (val != '')
                document.getElementById('nameOfFile').value += '$' + val + '$';
        },
        CustomFormat: function(){
            var selObj;
            selObj = document.getElementById('pdf_format');

            if (selObj.value == 'Custom'){
                document.getElementById('custom_format_table').style.display = 'table';
            } else {
                document.getElementById('custom_format_table').style.display = 'none';
            }
        },
        ConfirmIsPortal: function(oCheck){
            var module = document.getElementById('modulename').value;
            var curr_templatename = document.getElementById('filename').value;

            if (oCheck.defaultChecked == true && oCheck.checked == false){
                return confirm(app.vtranslate('LBL_UNSET_PORTAL') + '\n' + app.vtranslate('ARE_YOU_SURE'));
            } else if (oCheck.defaultChecked == false && oCheck.checked == true){
                var ajax_url = 'index.php?module=PDFMaker&action=AjaxRequestHandle&handler=confirm_portal&langmod=' + module + '&curr_templatename=' + curr_templatename;
                jQuery.ajax(ajax_url).success(function(){
                    if (confirm(response.responseText + '\n' + app.vtranslate('ARE_YOU_SURE')) == false)
                        oCheck.checked = false;
                }).error(function(){
                    alert('ConfirmIsPortal error');
                });
                return true;
            }
        },
        isLvTmplClicked: function(source){
            var oTrigger = document.getElementById('isListViewTmpl');
            var oButt = jQuery("#listviewblocktpl_butt");
            var oDlvChbx = document.getElementById('is_default_dv');
            var listViewblockTPLElement = jQuery("#listviewblocktpl");
            app.destroyChosenElement(listViewblockTPLElement);
            listViewblockTPLElement.attr("disabled",!(oTrigger.checked));

            var formElement = jQuery('#EditView');
            app.changeSelectElementView(formElement);
            oButt.attr("disabled",!(oTrigger.checked));
            if (source != 'init'){
                oDlvChbx.checked = false;
            }
            oDlvChbx.disabled = oTrigger.checked;
        },
        hf_checkboxes_changed: function(oChck, oType){
            var prefix;
            var optionsArr;
            if (oType == 'header'){
                prefix = 'dh_';
                optionsArr = new Array('allid', 'firstid', 'otherid');
            } else {
                prefix = 'df_';
                optionsArr = new Array('allid', 'firstid', 'otherid', 'lastid');
            }

            var tmpArr = oChck.id.split("_");
            var sufix = tmpArr[1];
            var i;
            if (sufix == 'allid'){
                for (i = 0; i < optionsArr.length; i++){
                    document.getElementById(prefix + optionsArr[i]).checked = oChck.checked;
                }
            } else {
                var allChck = document.getElementById(prefix + 'allid');
                var allChecked = true;
                for (i = 1; i < optionsArr.length; i++){
                    if (document.getElementById(prefix + optionsArr[i]).checked == false){
                        allChecked = false;
                        break;
                    }
                }
                allChck.checked = allChecked;
            }
        },
        templateActiveChanged: function(activeElm){
            var is_defaultElm1 = document.getElementById('is_default_dv');
            var is_defaultElm2 = document.getElementById('is_default_lv');
            if (activeElm.value == '1'){
                is_defaultElm1.disabled = false;
                is_defaultElm2.disabled = false;
            } else {
                is_defaultElm1.checked = false;
                is_defaultElm1.disabled = true;
                is_defaultElm2.checked = false;
                is_defaultElm2.disabled = true;
            }
        },
        CheckCustomFormat: function(){
            if (document.getElementById('pdf_format').value == 'Custom'){
                var pdfWidth = document.getElementById('pdf_format_width').value;
                var pdfHeight = document.getElementById('pdf_format_height').value;
                if (pdfWidth > 2000 || pdfHeight > 2000 || pdfWidth < 1 || pdfHeight < 1 || isNaN(pdfWidth) || isNaN(pdfHeight)){
                    alert(app.vtranslate('LBL_CUSTOM_FORMAT_ERROR'));
                    document.getElementById('pdf_format_width').focus();
                    return false;
                }
            }
            return true;
        },
        CheckSharing: function(){
            if (document.getElementById('sharing').value == 'share'){
                var selColStr = '';
                var selColObj = document.getElementById('sharingSelectedColumns');
                for (i = 0; i < selColObj.options.length; i++){
                    selColStr += selColObj.options[i].value + ';';
                }
                if (selColStr == ''){
                    alert(app.vtranslate('LBL_SHARING_ERROR'));
                    document.getElementById('sharingAvailList').focus();
                    return false;
                }
                document.getElementById('sharingSelectedColumnsString').value = selColStr;
            }
            return true;
        },
        sharing_changed: function(){
            var selectedValue = document.getElementById('sharing').value;
            if (selectedValue != 'share'){
                document.getElementById('sharing_share_div').style.display = 'none';
            } else {
                document.getElementById('sharing_share_div').style.display = 'block';
                PDFMaker_EditJs.setSharingObjects();
                PDFMaker_EditJs.showSharingMemberTypes();
            }
        },
        showSharingMemberTypes: function(){
            var selectedOption = document.getElementById('sharingMemberType').value;
            document.getElementById('sharingAvailList').options.length = 0;
            if (selectedOption == 'groups'){
                PDFMaker_EditJs.constructSelectOptions('groups', grpIdArr, grpNameArr);
            } else if (selectedOption == 'roles'){
                PDFMaker_EditJs.constructSelectOptions('roles', roleIdArr, roleNameArr);
            } else if (selectedOption == 'rs'){
                PDFMaker_EditJs.constructSelectOptions('rs', roleIdArr, roleNameArr);
            } else if (selectedOption == 'users'){
                PDFMaker_EditJs.constructSelectOptions('users', userIdArr, userNameArr);
            }
        },
        constructSelectOptions: function(selectedMemberType, idArr, nameArr){
            var i;
            var findStr = document.getElementById('sharingFindStr').value;
            if (findStr.replace(/^\s+/g, '').replace(/\s+$/g, '').length != 0){
                var k = 0;
                for (i = 0; i < nameArr.length; i++){
                    if (nameArr[i].indexOf(findStr) == 0){
                        constructedOptionName[k] = nameArr[i];
                        constructedOptionValue[k] = idArr[i];
                        k++;
                    }
                }
            } else {
                constructedOptionValue = idArr;
                constructedOptionName = nameArr;
            }
            var j;
            var nowNamePrefix;
            for (j = 0; j < constructedOptionName.length; j++){
                if (selectedMemberType == 'roles'){
                    nowNamePrefix = 'Roles::';
                } else if (selectedMemberType == 'rs'){
                    nowNamePrefix = 'RoleAndSubordinates::';
                } else if (selectedMemberType == 'groups'){
                    nowNamePrefix = 'Group::';
                } else if (selectedMemberType == 'users'){
                    nowNamePrefix = 'User::';
                }

                var nowName = nowNamePrefix + constructedOptionName[j];
                var nowId = selectedMemberType + '::' + constructedOptionValue[j]
                document.getElementById('sharingAvailList').options[j] = new Option(nowName, nowId);
            }
            constructedOptionValue = new Array();
            constructedOptionName = new Array();
        },
        sharingAddColumn: function(){
            for (i = 0; i < this.selectedColumnsObj.length; i++){
                this.selectedColumnsObj.options[i].selected = false;
            }

            for (i = 0; i < this.availListObj.length; i++){
                if (this.availListObj.options[i].selected == true){
                    var rowFound = false;
                    var existingObj = null;
                    for (j = 0; j < this.selectedColumnsObj.length; j++){
                        if (this.selectedColumnsObj.options[j].value == this.availListObj.options[i].value){
                            rowFound = true;
                            existingObj = this.selectedColumnsObj.options[j];
                            break;
                        }
                    }

                    if (rowFound != true){
                        var newColObj = document.createElement("OPTION");
                        newColObj.value = this.availListObj.options[i].value;
                        newColObj.text = this.availListObj.options[i].text;
                        this.selectedColumnsObj.appendChild(newColObj);
                        this.availListObj.options[i].selected = false;
                        newColObj.selected = true;
                        rowFound = false;
                    } else {
                        if (existingObj != null)
                            existingObj.selected = true;
                    }
                }
            }
        },
        sharingDelColumn: function(){
            for (i = this.selectedColumnsObj.options.length; i > 0; i--){
                if (this.selectedColumnsObj.options.selectedIndex >= 0)
                    this.selectedColumnsObj.remove(this.selectedColumnsObj.options.selectedIndex);
            }
        },
        setSharingObjects: function(){
            this.availListObj = document.getElementById("sharingAvailList");
            this.selectedColumnsObj = document.getElementById("sharingSelectedColumns");
        },
        checkDuplicateTemplateName: function(details) {
            return aDeferred.promise();
	},
    }
}
PDFMaker_EditJs.setSharingObjects();