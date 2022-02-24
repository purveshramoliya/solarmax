<?php
function handleSyncInstallerStatus($entityData){
    global $adb;
    $salesOrderId =  $entityData->get('cf_932');
    $id = (explode("x",$salesOrderId));
    $salesorderId =  $id[1];
    $sostatus =  $entityData->get('sostatus');
    $sql = "update `vtiger_salesorder` set sostatus = ? where salesorderid = ?";
    $params = array($sostatus , $salesorderId);
    $result = $adb->pquery($sql, $params);
}
