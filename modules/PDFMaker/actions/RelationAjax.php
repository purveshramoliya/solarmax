<?php
/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_RelationAjax_Action extends Vtiger_Action_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->exposeMethod('addRelation');
        $this->exposeMethod('deleteRelation');
        $this->exposeMethod('getRelatedListPageCount');
    }

    function checkPermission(Vtiger_Request $request)
    {
    }

    function preProcess(Vtiger_Request $request)
    {
        return true;
    }

    function postProcess(Vtiger_Request $request)
    {
        return true;
    }

    function process(Vtiger_Request $request)
    {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    function addRelation($request)
    {
        $adb = PearDatabase::getInstance();
        $sourceModule = $request->getModule();
        $sourceRecordId = $request->get('src_record');
        if (substr($sourceRecordId, 0, 1) == "t") {
            $sourceRecordId = substr($sourceRecordId, 1);
        }

        $relatedModule = $request->get('related_module');
        $relatedRecordIdList = $request->get('related_record_list');

        foreach ($relatedRecordIdList as $relatedRecordId) {
            if ($relatedModule == "ITS4YouStyles") {
                $adb->pquery("INSERT INTO its4you_stylesrel (parentid, styleid, module) VALUES (?,?,?)", array($sourceRecordId, $relatedRecordId, "PDFMaker"));
            }
        }
    }

    function deleteRelation($request)
    {
        $adb = PearDatabase::getInstance();
        $sourceModule = $request->getModule();
        $sourceRecordId = $request->get('src_record');
        if (substr($sourceRecordId, 0, 1) == "t") {
            $sourceRecordId = substr($sourceRecordId, 1);
        }
        $relatedModule = $request->get('related_module');
        $relatedRecordIdList = $request->get('related_record_list');
        vglobal('currentModule', $relatedModule);

        foreach ($relatedRecordIdList as $relatedRecordId) {
            if ($relatedModule == "ITS4YouStyles") {
                $adb->pquery("DELETE FROM its4you_stylesrel WHERE parentid = ? AND styleid = ? AND module = ?", array($sourceRecordId, $relatedRecordId, "PDFMaker"));
            }
        }
        return true;
    }

    function getRelatedListPageCount(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();
        $relatedModuleName = $request->get('relatedModule');
        $parentId = $request->get('record');
        $label = $request->get('tab_label');
        $pagingModel = new Vtiger_Paging_Model();
        $parentRecordModel = Vtiger_Record_Model::getInstanceById($parentId, $moduleName);
        $relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName, $label);
        $totalCount = $relationListView->getRelatedEntriesCount();
        $pageLimit = $pagingModel->getPageLimit();
        $pageCount = ceil((int)$totalCount / (int)$pageLimit);
        if ($pageCount == 0) {
            $pageCount = 1;
        }
        $result = array();
        $result['numberOfRecords'] = $totalCount;
        $result['page'] = $pageCount;
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }
}
