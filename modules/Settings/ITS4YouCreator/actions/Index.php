<?php
/*******************************************************************************
 * The content of this file is subject to the ITS4YouCreator license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ***************************************************************************** */

class Settings_ITS4YouCreator_Index_Action extends Vtiger_BasicAjax_Action {

    public function process(Vtiger_Request $request) {

        $qualifiedmodule = $request->getModule(false);
        $tabid = $request->get('tabid');
        $mode = $request->get('mode');
        $result = ITS4YouCreator_Module_Model::updateModuleField($tabid, $mode);

        $return = array('success' => $result, 'message' => vtranslate('', $qualifiedmodule));
        $response = new Vtiger_Response();
        $response->setResult($return);
        $response->emit();
    }
}