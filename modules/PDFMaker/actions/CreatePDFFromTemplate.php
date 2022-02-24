<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_CreatePDFFromTemplate_Action extends Vtiger_Action_Controller
{

    function __construct()
    {
    }

    public function checkPermission(Vtiger_Request $request)
    {
    }

    function process(Vtiger_Request $request)
    {

        PDFMaker_Debugger_Model::GetInstance()->Init();
        $checkGenerate = new PDFMaker_checkGenerate_Model();

        if ($request->has('print') && !$request->isEmpty('print')) {
            if ($request->get('print') == "true") {
                $checkGenerate->setAvailablePassword(false);
            }
        }

        $checkGenerate->generate($request);
    }
}