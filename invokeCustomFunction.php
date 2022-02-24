<?php
require_once("include/database/PearDatabase.php");
$adb = PearDatabase::getInstance();
$forModule = 'PurchaseOrder';
$summary = 'set Estimate Date ' . $forModule;
$result = $adb->pquery("SELECT workflow_id FROM com_vtiger_workflows WHERE summary=? AND module_name=?", array($summary, $forModule));
if ($adb->num_rows($result) == 0) {
    echo 'Create Workflow for ' . $forModule . '!<br />';

    $wm = new VTWorkflowManager($adb);
    $wf = Settings_Workflows_Record_Model::getCleanInstance($moduleName);
    $wf->description = $summary;
    $wf->test = Zend_Json::encode(array());
    $wf->moduleName = $forModule;
    $wf->executionCondition = 3;
    $wf->filtersavedinnew = 6;
    $wm->save($wf);
    $adb->pquery('UPDATE com_vtiger_workflows SET type=? WHERE workflow_id=?', array('basic', $wf->id));
    $wfId = $wf->id;
} else {
    $wfId = $adb->query_result($result, 0, 'workflow_id');
}
$tResult = $adb->pquery("SELECT task_id FROM com_vtiger_workflowtasks WHERE workflow_id=?", array($wfId));
if ($adb->num_rows($tResult) == 0) {
    $tm = new VTTaskManager($adb);
    echo 'Create Workflow Task for ' . $forModule . '!<br />';
    $task = $tm->createTask('VTEntityMethodTask', $wfId);
    $task->active = true;
    $task->summary = "SyncInstallerStatus Date Handler";
    $task->methodName = "SyncInstallerStatus";
    $tm->saveTask($task);
}
