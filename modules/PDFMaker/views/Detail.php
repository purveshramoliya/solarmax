<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_Detail_View extends Vtiger_Index_View
{

    var $pdf_version_type = "";
    var $pdftemplateResult = false;
    var $is_block = false;

    function __construct()
    {
        parent::__construct();
        $this->exposeMethod('showRelatedList');
    }

    public function preProcess(Vtiger_Request $request, $display = true)
    {
        PDFMaker_Debugger_Model::GetInstance()->Init();

        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();
        $viewer->assign('QUALIFIED_MODULE', $moduleName);
        Vtiger_Basic_View::preProcess($request, false);
        $viewer = $this->getViewer($request);

        $moduleName = $request->getModule();
        if (!empty($moduleName)) {
            //$moduleModel = PDFMaker_PDFMaker_Model::getInstance($moduleName);
            $moduleModel = new PDFMaker_PDFMaker_Model('PDFMaker');
            $currentUser = Users_Record_Model::getCurrentUserModel();
            $userPrivilegesModel = Users_Privileges_Model::getInstanceById($currentUser->getId());
            $permission = $userPrivilegesModel->hasModulePermission($moduleModel->getId());
            $viewer->assign('MODULE', $moduleName);

            if (!$permission) {
                $viewer->assign('MESSAGE', 'LBL_PERMISSION_DENIED');
                $viewer->view('OperationNotPermitted.tpl', $moduleName);
                exit;
            }

            $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
            $linkModels = $moduleModel->getSideBarLinks($linkParams);

            $viewer->assign('QUICK_LINKS', $linkModels);
        }

        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        $viewer->assign('CURRENT_VIEW', $request->get('view'));

        $PDFMaker = new PDFMaker_PDFMaker_Model();
        if ($PDFMaker->CheckPermissions("DETAIL") == false) {
            $PDFMaker->DieDuePermission();
        }

        if ($request->has('templateid') && !$request->isEmpty('templateid')) {
            $templateid = $request->get('templateid');
            $this->pdftemplateResult = $PDFMaker->GetDetailViewData($templateid);

            $viewer->assign("FILENAME", $this->pdftemplateResult["filename"]);
            $viewer->assign("DESCRIPTION", $this->pdftemplateResult["description"]);
            $viewer->assign("TEMPLATEID", $this->pdftemplateResult["templateid"]);
            $viewer->assign("MODULENAME", getTranslatedString($this->pdftemplateResult["module"]));

            if ($this->pdftemplateResult["type"] != "") {
                $this->is_block = true;

                if ($this->pdftemplateResult["type"]) {
                    $viewer->assign("TEMPLATEBLOCKTYPEINFO", "LBL_" . strtoupper($this->pdftemplateResult["type"]) . "_INFORMATIONS");
                }
            }

        }

        $viewer->assign("IS_BLOCK", $this->is_block);

        if ($this->pdftemplateResult["permissions"]["edit"]) {
            $viewer->assign("EXPORT", "yes");
        }

        if ($PDFMaker->GetVersionType() != "deactivate") {
            if ($this->pdftemplateResult["permissions"]["edit"]) {
                $viewer->assign("EDIT", "permitted");
                $viewer->assign("IMPORT", "yes");
            }

            if ($this->pdftemplateResult["permissions"]["delete"]) {
                $viewer->assign("DELETE", "permitted");
            }
        }

        $viewer->assign('MODULE_NAME', $moduleName);
        $mode = $request->getMode();
        $viewer->assign('MODE', $mode);

        $this->pdf_version_type = $PDFMaker->GetVersionType();

        if ($display) {
            $this->preProcessDisplay($request);
        }
    }

    function preProcessTplName(Vtiger_Request $request)
    {
        return 'DetailViewPreProcess.tpl';
    }

    function process(Vtiger_Request $request)
    {
        $mode = $request->getMode();
        if (!empty($mode)) {
            echo $this->invokeExposedMethod($mode, $request);
            return;
        }
        echo $this->showModuleDetailView($request);
    }

    public function showModuleDetailView(Vtiger_Request $request)
    {
        PDFMaker_Debugger_Model::GetInstance()->Init();

        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');

        $PDFMaker = new PDFMaker_PDFMaker_Model();

        $viewer = $this->getViewer($request);

        if ($request->has('templateid') && !$request->isEmpty('templateid')) {
            if (!$this->pdftemplateResult) {
                $templateid = $request->get('templateid');
                $this->pdftemplateResult = $PDFMaker->GetDetailViewData($templateid);
            }

            $viewer->assign("FILENAME", $this->pdftemplateResult["filename"]);
            $viewer->assign("DESCRIPTION", $this->pdftemplateResult["description"]);
            $viewer->assign("TEMPLATEID", $this->pdftemplateResult["templateid"]);
            $viewer->assign("MODULENAME", getTranslatedString($this->pdftemplateResult["module"]));


            $pdf_body = decode_html($this->pdftemplateResult["body"]);
            $pdf_header = decode_html($this->pdftemplateResult["header"]);
            $pdf_footer = decode_html($this->pdftemplateResult["footer"]);

            $PDFMakerModel->addAwesomeStyle($pdf_body, false);
            $PDFMakerModel->addAwesomeStyle($pdf_header, false);
            $PDFMakerModel->addAwesomeStyle($pdf_footer, false);

            if (vtlib_isModuleActive("ITS4YouStyles")) {
                $ITS4YouStylesModuleModel = new ITS4YouStyles_Module_Model();
                $ITS4YouStylesModuleModel->loadStyles($this->pdftemplateResult["templateid"], "PDFMaker");
                $pdf_body = $ITS4YouStylesModuleModel->addStyles($pdf_body);
                $pdf_header = $ITS4YouStylesModuleModel->addStyles($pdf_header);
                $pdf_footer = $ITS4YouStylesModuleModel->addStyles($pdf_footer);
            }

            $viewer->assign("BODY", $pdf_body);
            $viewer->assign("HEADER", $pdf_header);
            $viewer->assign("FOOTER", $pdf_footer);

            $viewer->assign("IS_ACTIVE", $this->pdftemplateResult["is_active"]);
            $viewer->assign("IS_DEFAULT", $this->pdftemplateResult["is_default"]);
            $viewer->assign("ACTIVATE_BUTTON", $this->pdftemplateResult["activateButton"]);
            $viewer->assign("DEFAULT_BUTTON", $this->pdftemplateResult["defaultButton"]);

            if ($this->pdftemplateResult["type"] != "") {
                $this->is_block = true;

                if ($this->pdftemplateResult["type"]) {
                    $viewer->assign("TEMPLATEBLOCKTYPEINFO", "LBL_" . strtoupper($this->pdftemplateResult["type"]) . "_INFORMATIONS");
                }
            }
        }

        if ($this->pdf_version_type == "") {
            $this->pdf_version_type = $PDFMaker->GetVersionType();
        }

        $viewer->assign("IS_BLOCK", $this->is_block);

        $viewer->assign("VERSION", $this->pdf_version_type . " " . PDFMaker_Version_Helper::$version);

        $category = getParentTab();
        $viewer->assign("CATEGORY", $category);
        $viewer->view('Detail.tpl', 'PDFMaker');
    }

    public function showRelatedList(Vtiger_Request $request)
    {
        $related_module = $request->get("relatedModule");
        if ($related_module == "ITS4YouStyles") {
            $viewer = $this->getViewer($request);
            $ITS4YouStyles_Module_Model = new ITS4YouStyles_Module_Model();
            echo $ITS4YouStyles_Module_Model->showITS4YouStyles($request, $viewer);
        }
    }

    public function postProcess(Vtiger_Request $request)
    {
        $PDFMaker = new PDFMaker_PDFMaker_Model();
        $selectedTabLabel = $request->get('tab_label');
        if (empty($selectedTabLabel)) {
            $selectedTabLabel = vtranslate('LBL_PROPERTIES', 'PDFMaker');
        }
        $viewer = $this->getViewer($request);
        $viewer->assign('SELECTED_TAB_LABEL', $selectedTabLabel);
        if ($request->has('templateid') && !$request->isEmpty('templateid')) {
            $record = $request->get('templateid');
            $detailViewLinks = $PDFMaker->getDetailViewLinks($record);
            $viewer->assign('DETAILVIEW_LINKS', $detailViewLinks);
        }
        $mode = $request->getMode();
        $viewer->assign('MODE', $mode);
        $viewer->assign("IS_BLOCK", $this->is_block);

        $viewer->view('DetailViewPostProcess.tpl', 'PDFMaker');
        parent::postProcess($request);
    }

    function getHeaderScripts(Vtiger_Request $request)
    {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "layouts.vlayout.modules.Vtiger.resources.List",
            "layouts.vlayout.modules.Vtiger.resources.Detail",
            "layouts.vlayout.modules.PDFMaker.resources.Detail",
            "layouts.vlayout.modules.Vtiger.resources.RelatedList"
        );
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }
}