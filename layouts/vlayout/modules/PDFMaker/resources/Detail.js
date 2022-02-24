/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

jQuery.Class("PDFMaker_Detail_Js",{
        changeActiveOrDefault : function(templateid, type){
            if (templateid != ""){
                var url = 'index.php?module=PDFMaker&action=IndexAjax&mode=ChangeActiveOrDefault&templateid='+ templateid + '&subjectChanged=' + type;
                AppConnector.request(url).then(function(data){
                    location.reload(true);
                });
            }
        },
        setPreviewContent : function(type){
                var previewcontent =  jQuery('#previewcontent_'+type).html();
                var previewFrame = document.getElementById('preview_'+type);
                var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
                preview.open();
                preview.write(previewcontent);
                preview.close(); 
                jQuery('#previewcontent_'+type).html(''); 
        }
    },{
    detailViewContentHolder : false,
    getTabByLabel : function(tabLabel) {
           var tabs = this.getTabs();
           var targetTab = false;
           tabs.each(function(index,element){
                   var tab = jQuery(element);
                   var labelKey = tab.data('labelKey');
                   if(labelKey == tabLabel){
                           targetTab = tab;
                           return false;
                   }
           });
           return targetTab;
    },
    selectModuleTab : function(){
           var relatedTabContainer = this.getTabContainer();
           var moduleTab = relatedTabContainer.find('li.module-tab');
           this.deSelectAllrelatedTabs();
           this.markTabAsSelected(moduleTab);
    },
    deSelectAllrelatedTabs : function() {
           var relatedTabContainer = this.getTabContainer();
           this.getTabs().removeClass('active');
    },
    markTabAsSelected : function(tabElement){
           tabElement.addClass('active');
    },
    getSelectedTab : function() {
           var tabContainer = this.getTabContainer();
           return tabContainer.find('li.active');
    },
    getTabContainer : function(){
           return jQuery('div.related');
    },
    getTabs : function() {
           return this.getTabContainer().find('li');
    },
    getRecordId : function(){
           var newr = "t" + jQuery('#templateid').val();
       return newr; 
    },
    getRelatedModuleName : function() {
           return jQuery('#relatedModuleName').val();
    },
    getContentHolder : function() {
           if(this.detailViewContentHolder == false) {
                   this.detailViewContentHolder = jQuery('div.details div.contents');
            }
           return this.detailViewContentHolder;
    },
    registerEventForRelatedTabClick : function(){
            var thisInstance = this;
            var detailContentsHolder = thisInstance.getContentHolder();
            var detailContainer = detailContentsHolder.closest('div.detailViewInfo');
            app.registerEventForDatePickerFields(detailContentsHolder);
            app.registerEventForTimeFields(detailContentsHolder);
            jQuery('.related', detailContainer).on('click', 'li', function(e, urlAttributes){
                    var tabElement = jQuery(e.currentTarget);
                    var element = jQuery('<div></div>');
                    element.progressIndicator({
                            'position':'html',
                            'blockInfo' : {
                                    'enabled' : true,
                                    'elementToBlock' : detailContainer
                            }
                    });
                    var url = tabElement.data('url');
                    if(typeof urlAttributes != 'undefined'){
                            var callBack = urlAttributes.callback;
                            delete urlAttributes.callback;
                    }
                    thisInstance.loadContents(url,urlAttributes).then(
                            function(data){
                                    thisInstance.deSelectAllrelatedTabs();
                                    thisInstance.markTabAsSelected(tabElement);
                                    Vtiger_Helper_Js.showHorizontalTopScrollBar();
                                    element.progressIndicator({'mode': 'hide'});
                                    if(typeof callBack == 'function'){
                                            callBack(data);
                                    }
                                    if(tabElement.data('linkKey') == thisInstance.detailViewSummaryTabLabel) {
                                            thisInstance.loadWidgets();
                                            thisInstance.registerSummaryViewContainerEvents(detailContentsHolder);
                                    }
                                    app.notifyPostAjaxReady();
                            },
                            function (){
                                    element.progressIndicator({'mode': 'hide'});
                            }
                    );
            });
    },    
    loadContents : function(url,data) {
            var thisInstance = this;
            var aDeferred = jQuery.Deferred();
            var detailContentsHolder = this.getContentHolder();
            var params = url;
            if(typeof data != 'undefined'){
                    params = {};
                    params.url = url;
                    params.data = data;
            }
            AppConnector.requestPjax(params).then(
                    function(responseData){
                            detailContentsHolder.html(responseData);
                            responseData = detailContentsHolder.html();

                            aDeferred.resolve(responseData);
                    },
                    function(){

                    }
            );
            return aDeferred.promise();
    },
    registerEventForRelatedList : function(){
            var thisInstance = this;
            var detailContentsHolder = this.getContentHolder();
            detailContentsHolder.on('click','.relatedListHeaderValues',function(e){
                    var element = jQuery(e.currentTarget);
                    var selectedTabElement = thisInstance.getSelectedTab();
                    var relatedModuleName = thisInstance.getRelatedModuleName();
                    var relatedController = new Vtiger_RelatedList_Js(thisInstance.getRecordId(), app.getModuleName(), selectedTabElement, relatedModuleName);
                    relatedController.sortHandler(element);
            });
            detailContentsHolder.on('click', 'button.selectRelation', function(e){
                    var selectedTabElement = thisInstance.getSelectedTab();
                    var relatedModuleName = thisInstance.getRelatedModuleName();
                    var relatedController = new Vtiger_RelatedList_Js(thisInstance.getRecordId(), app.getModuleName(), selectedTabElement, relatedModuleName);
                    relatedController.showSelectRelationPopup().then(function(data){
                            var emailEnabledModule = jQuery(data).find('[name="emailEnabledModules"]').val();
                            if(emailEnabledModule){
                                    thisInstance.registerEventToEditRelatedStatus();
                            }
                    });
            });
            detailContentsHolder.on('click', 'button.addRelation', function(e){
                    var selectedTabElement = thisInstance.getSelectedTab();
                    var relatedModuleName = thisInstance.getRelatedModuleName();
                    var sourceRecord = thisInstance.getRecordId();
                    var sourceModuleName = app.getModuleName();
                    window.location.href = "index.php?module="+relatedModuleName+"&view=Edit&sourceModule="+sourceModuleName+"&sourceRecord="+sourceRecord+"&relationOperation=true";
            });
            detailContentsHolder.on('click', 'a.relationDelete', function(e){
                    e.stopImmediatePropagation();
                    var element = jQuery(e.currentTarget);
                    var message = app.vtranslate('LBL_DELETE_CONFIRMATION');
                    Vtiger_Helper_Js.showConfirmationBox({'message' : message}).then(
                            function(e) {
                                    var row = element.closest('tr');
                                    var relatedRecordid = row.data('id');
                                    var selectedTabElement = thisInstance.getSelectedTab();
                                    var relatedModuleName = thisInstance.getRelatedModuleName();
                                    var relatedController = new Vtiger_RelatedList_Js(thisInstance.getRecordId(), app.getModuleName(), selectedTabElement, relatedModuleName);
                                    relatedController.deleteRelation([relatedRecordid]).then(function(response){
                                            relatedController.loadRelatedList();
                                    });
                            }
                    );
            });  
            detailContentsHolder.on('click','.listViewEntries',function(e){
                    if(jQuery(e.target, jQuery(e.currentTarget)).is('td:last-child')) return;
                    var elem = jQuery(e.currentTarget);
                    var recordUrl = elem.data('recordurl');
                    if(typeof recordUrl == 'undefined') {
                        return;
                    }
                    window.location.href = recordUrl;
            });
    },
    registerEvents : function(){
        var thisInstance = this;
        this.registerEventForRelatedTabClick();
        this.registerEventForRelatedList();
    }
});  

