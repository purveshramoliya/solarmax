<?php
/*********************************************************************************
 * The content of this file is subject to the ITS4YouCreator license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

class ITS4YouCreator_Module_Model extends Vtiger_Module_Model {

    public function getSettingLinks()
    {
        $currentUser = Users_Record_Model::getCurrentUserModel();

        $settingsLinks = [];
        if ($currentUser->isAdminUser()) {

            $settingsLinks[] = array(
                'linktype' => 'LISTVIEWSETTING',
                'linklabel' => 'LBL_SETTINGS',
                'linkurl' => $this->getDefaultUrl(),
            );
            $settingsLinks[] = array(
                "linktype" => "LISTVIEWSETTING",
                "linklabel" => "LBL_UPGRADE",
                "linkurl" => "index.php?module=ModuleManager&parent=Settings&view=ModuleImport&mode=importUserModuleStep1",
            );
            $settingsLinks[] = array(
                "linktype" => "LISTVIEWSETTING",
                "linklabel" => "LBL_UNINSTALL",
                "linkurl" => "index.php?module=ITS4YouCreator&parent=Settings&view=Uninstall",
            );
        }

        return $settingsLinks;
    }

    public function getDefaultUrl() {
	    return 'index.php?parent=Settings&module=ITS4YouCreator&view=Index';
    }

	public static function updateModuleField($tabid, $mode) {

        $adb = PearDatabase::getInstance();
        $creatorFields = self::getCreatorFields();
        $creatorField = $creatorFields[$tabid];
        $moduleName = getTabModuleName($tabid);
        $return = false;

        if(!empty($moduleName)) {
            $presence = 1;
            $notpresence = 2;

            $blockId = $creatorField['createdtime']['block'];

            if($blockId > 0) {
                $blockId = $creatorField['smownerid']['block'];
            }

            $blockName = getBlockName($blockId);
            $fieldName = 'smcreatorid';

            if($mode == 'Show') {
                $presence = 2;
                $notpresence = 1;

                if(!isset($creatorField['smcreatorid'])) {

                    include_once 'vtlib/Vtiger/Module.php';
                    include_once 'vtlib/Vtiger/Field.php';
                    include_once 'vtlib/Vtiger/Block.php';

                    $module = Vtiger_Module::getInstance($moduleName);
                    $block = Vtiger_Block::getInstance($blockName, $module);
                    $field = Vtiger_Field::getInstance($fieldName, $module);

                    if(!$field && is_object($block)) {
                        $field = new Vtiger_Field();
                        $field->name = 'creator';
                        $field->label = 'Creator';
                        $field->table = 'vtiger_crmentity';
                        $field->column = $fieldName;
                        $field->uitype = 52;
                        $field->typeofdata = 'V~O';
                        $field->displaytype = 2;
                        $field->headerfield = 0;

                        $block->addField($field);
                    }
                }
            }

            $adb->pquery('UPDATE vtiger_field SET presence=? WHERE tabid=? AND columnname=? AND presence=?', array($presence ,$tabid, $fieldName, $notpresence));

            $return = true;
        }


        return $return;
    }

    public static function getCreatorFields() {
        $adb = PearDatabase::getInstance();
        $query = 'SELECT tabid, columnname, block, fieldid, presence FROM vtiger_field WHERE columnname = ? OR columnname = ? OR columnname = ? ORDER BY tabid';
        $params = array('smcreatorid', 'createdtime', 'smownerid');
        $result = $adb->pquery($query, $params);
        $num_rows = $adb->num_rows($result);
        $fields = array();

        for ($i = 0; $i < $num_rows; $i++) {
            $field = $adb->query_result_rowdata($result,$i);

            if($field['columnname'] == 'smcreatorid' && $field['presence'] == 2) {
                $fields[$field['tabid']]['active'] = true;
            }

            $fields[$field['tabid']][$field['columnname']] = $field;
        }

        return $fields;
    }

    public static function showCreators() {
        $modules = self::getEntityModules();

        foreach($modules as $module) {
            self::updateModuleField($module->id, 'Show');
        }
    }

    public function disableCreatorFields()
    {
        $adb = PearDatabase::getInstance();
        $adb->pquery('UPDATE vtiger_field SET presence=? WHERE columnname=? AND tablename=? AND fieldname=?', array(1, 'smcreatorid', 'vtiger_crmentity', 'creator'));
    }
}