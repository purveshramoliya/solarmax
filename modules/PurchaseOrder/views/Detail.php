<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class PurchaseOrder_Detail_View extends Inventory_Detail_View {
    function __construct() {
        parent::__construct();
    }

    public function showModuleDetailView(Vtiger_Request $request) {

        $recordId = $request->get('record');
        $moduleName = $request->getModule();
        $recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
        $viewer = $this->getViewer($request);
        $viewer->assign('IMAGE_DETAILS', $recordModel->getImageDetails());
        return parent::showModuleDetailView($request);
    }

   

    public function getOverlayHeaderScripts(Vtiger_Request $request) {
        $moduleName = $request->getModule();
        $moduleDetailFile = 'modules.' . $moduleName . '.resources.Detail';
        $jsFileNames = array(
            '~libraries/jquery/boxslider/jquery.bxslider.min.js',
            'modules.PriceBooks.resources.Detail',
        );
        $jsFileNames[] = $moduleDetailFile;
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        return $jsScriptInstances;
    }

    public function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();
        $moduleDetailFile = 'modules.' . $moduleName . '.resources.Detail';
        $moduleRelatedListFile = 'modules.' . $moduleName . '.resources.RelatedList';
        unset($headerScriptInstances[$moduleDetailFile]);
        unset($headerScriptInstances[$moduleRelatedListFile]);

        $jsFileNames = array(
            '~libraries/jquery/jquery.cycle.min.js',
            '~libraries/jquery/boxslider/jquery.bxslider.min.js',
            'modules.PriceBooks.resources.Detail',
            'modules.PriceBooks.resources.RelatedList',
        );

        $jsFileNames[] = $moduleDetailFile;
        $jsFileNames[] = $moduleRelatedListFile;

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}
