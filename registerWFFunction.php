<?php
require_once("modules/com_vtiger_workflow/include.inc");
require_once("modules/com_vtiger_workflow/tasks/VTEntityMethodTask.inc");
require_once("modules/com_vtiger_workflow/VTEntityMethodManager.inc");
require_once("include/database/PearDatabase.php");

$adb = PearDatabase::getInstance();
$emm = new VTEntityMethodManager($adb);

$result = $adb->pquery("SELECT function_name FROM com_vtiger_workflowtasks_entitymethod WHERE module_name=? AND method_name=?", array('PurchaseOrder', 'SyncInstallerStatus'));
if ($adb->num_rows($result) == 0) {
    $emm->addEntityMethod("PurchaseOrder", "SyncInstallerStatus", "include/SyncInstallerStatusHandler.php", "handleSyncInstallerStatus");
} else {
    print_r("already exits");
}
