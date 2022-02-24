<?php
function handleSetEstimatedDate($entityData)
{
    global  $adb;
    $wsId = $entityData->getId();
    $parts = explode('x', $wsId);
    $entityId = $parts[1];

    $query = "select * from vtiger_contactaddress where contactaddressid  = ? ";
    $PtQuery = $adb->pquery($query, array($entityId));
    $PtFieldsCount = $adb->num_rows($PtQuery);

    for ($i = 0; $i < $PtFieldsCount; $i++) {
        $mailingcity = $adb->query_result($PtQuery, $i, 'mailingcity');
        $mailingstreet = $adb->query_result($PtQuery, $i, 'mailingstreet');
        $mailingstate = $adb->query_result($PtQuery, $i, 'mailingstate');
        $mailingzip = $adb->query_result($PtQuery, $i, 'mailingzip');
    }

    $updateQueryOfQuote  = "update vtiger_quotesbillads  ". 
    " inner join vtiger_quotes on vtiger_quotes.quoteid = vtiger_quotesbillads.quotebilladdressid " .
    " set bill_city = ? , bill_code = ? ,bill_street = ?, bill_state = ? ".
    " where vtiger_quotes.contactid = ?";
    $PtQ = $adb->pquery($updateQueryOfQuote, array($mailingcity,$mailingzip,$mailingstreet,$mailingstate,$entityId));

    $updateQueryOfQuote  = "update vtiger_sobillads  ". 
    " inner join vtiger_salesorder on vtiger_salesorder.salesorderid = vtiger_sobillads.sobilladdressid " .
    " set bill_city = ? , bill_code = ? ,bill_street = ?, bill_state = ? ".
    " where vtiger_salesorder.contactid = ?";
    $PtQ = $adb->pquery($updateQueryOfQuote, array($mailingcity,$mailingzip,$mailingstreet,$mailingstate,$entityId));

    $updateQueryOfQuote  = "update vtiger_pobillads  ". 
    " inner join vtiger_purchaseorder on vtiger_purchaseorder.purchaseorderid = vtiger_pobillads.pobilladdressid " .
    " set bill_city = ? , bill_code = ? ,bill_street = ?, bill_state = ? ".
    " where vtiger_purchaseorder.contactid = ?";
    $PtQ = $adb->pquery($updateQueryOfQuote, array($mailingcity,$mailingzip,$mailingstreet,$mailingstate,$entityId));

    $updateQueryOfQuote  = "update vtiger_invoicebillads  ". 
    " inner join vtiger_invoice on vtiger_invoice.invoiceid = vtiger_invoicebillads.invoicebilladdressid " .
    " set bill_city = ? , bill_code = ? ,bill_street = ?, bill_state = ? ".
    " where vtiger_invoice.contactid = ?";
    $PtQ = $adb->pquery($updateQueryOfQuote, array($mailingcity,$mailingzip,$mailingstreet,$mailingstate,$entityId));
    
}
