<?php
/*********************************************************************************
 * The content of this file is subject to the ITS4YouCreator license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/

require_once 'modules/Webforms/model/WebformsModel.php';
require_once 'include/Webservices/DescribeObject.php';

class ITS4YouCreator
{

    protected static $moduleDescribeCache = array();
    public $moduleName = 'ITS4YouCreator';
    public $LBL_MODULE_NAME = 'ITS4YouCreator';
    public $LBL_MODULE_LABEL = 'Creator 4 You';
    public $db;
    public $log;

    public function __construct()
    {
        global $log, $currentModule;
        $this->db = PearDatabase::getInstance();
        $this->log = $log;
    }

    public function vtlib_handler($moduleName, $eventType)
    {
        switch ($eventType) {
            case 'module.postinstall':
            case 'module.enabled':
            case 'module.postupdate':
                $this->addCustomLinks();
                break;
            case 'module.disabled':
            case 'module.preuninstall':
            case 'module.preupdate':
                $this->deleteCustomLinks();
                break;
        }
    }

    public function addCustomLinks()
    {
        $image = '';
        $description = 'Creator field for modules.';
        $linkto = 'index.php?module=ITS4YouCreator&parent=Settings&view=Index';
        $fieldid = $this->db->getUniqueID('vtiger_settings_field');
        $blockid = getSettingsBlockId('LBL_OTHER_SETTINGS');
        $seq_res = $this->db->pquery('SELECT max(sequence) AS max_seq FROM vtiger_settings_field WHERE blockid = ?', array($blockid));
        $seq_res++;
        $sql = 'INSERT INTO vtiger_settings_field(fieldid, blockid, name, iconpath, description, linkto, sequence) VALUES (?,?,?,?,?,?,?)';
        $params = array($fieldid, $blockid, $this->LBL_MODULE_LABEL, $image, $description, $linkto, $seq_res);
        $this->db->pquery($sql, $params);

        ITS4YouCreator_Module_Model::showCreators();
    }

    public function deleteCustomLinks()
    {
        $this->db->pquery('DELETE FROM vtiger_settings_field  WHERE name=?', array($this->LBL_MODULE_LABEL));
    }
}
