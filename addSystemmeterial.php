<?php

//include_once('modules/Vtiger/models/Module.php');
//include_once('vtlib/Vtiger/Module.php');
//include_once 'config.php';
//include_once 'include/Webservices/Relation.php';
//
//include_once 'vtlib/Vtiger/Module.php';
//include_once 'includes/main/WebUI.php';
//
//$invoiceModule = Vtiger_Module_Model::getInstance('Invoice');
//$appliedCreditsField = $invoiceModule->getField('applied_credits');
//if (!$appliedCreditsField) {
//    $block = Vtiger_Block::getInstance('LBL_INVOICE_INFORMATION', $invoiceModule);
//    $field = new Vtiger_Field();
//    $field->name = 'applied_credits';
//    $field->column = 'applied_credits';
//    $field->uitype = 72;
//    $field->table = 'vtiger_invoice';
//    $field->label = 'Applied Credits';
//    $field->summaryfield = 1;
//    $field->readonly = 1;
//    $field->presence = 2;
//    $field->typeofdata = 'N~O';
//    $field->columntype = 'DECIMAL(25, 8)';
//    $field->quickcreate = 3;
//    $field->displaytype = 3;
//    $field->masseditable = 1;
//    $field->defaultvalue = 0;
//    $block->addField($field);
//} else {
//    echo "field is present";
//}
//include_once('includes/Loader.php');
//include_once('modules/Vtiger/models/Module.php');
//include_once('vtlib/Vtiger/Module.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$invoiceModule = Vtiger_Module_Model::getInstance('Invoice');
//var_dump($invoiceModule);
//die();
//$blockInstance = Vtiger_Block::getInstance('LBL_INVOICE_INFORMATION', $invoiceModule);
//$fieldInstance = new Vtiger_Field();
//$fieldInstance->name = 'PayslipName';
//$fieldInstance->table = 'vtiger_invoice';
//$fieldInstance->column = 'payslipname';
//$fieldInstance->columntype = 'VARCHAR(100)';
//$fieldInstance->uitype = 2;
//$fieldInstance->typeofdata = 'V~M';
//$blockInstance->addField($fieldInstance);


// ---------------------------------- field creation starts from here --------------------------------------------

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_765';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_765';
// $fieldInstance->label='NMI#';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 1;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_767';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_767';
// $fieldInstance->label='Peak Meter No';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 1;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_769';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_769';
// $fieldInstance->label='Off Peak meter No';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 1;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_771';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_771';
// $fieldInstance->label='DNSP';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 1;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);

include_once('vtlib/Vtiger/Module.php');
$moduleName='PurchaseOrder';
$moduleInstance = Vtiger_Module::getInstance($moduleName);
$blockInstance = Vtiger_Block::getInstance('Other Product Details', $moduleInstance);
$fieldInstance = new Vtiger_Field();
$fieldInstance->name = 'cf_1039';
$fieldInstance->table = $moduleInstance->basetable;
$fieldInstance->column = 'cf_1039';
$fieldInstance->label='Material Order no.';
$fieldInstance->columntype = 'VARCHAR(100)';
$fieldInstance->uitype = 1;
$fieldInstance->typeofdata = 'V~O';
$blockInstance->addField($fieldInstance);
echo "done"

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_753';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_753';
// $fieldInstance->label='House Type';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 16;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);
// $dayOfTheWeek->setPicklistValues(array('Single Storey','Double Storey','Ground','MultiStorey','Others'));

// include_once('vtlib/Vtiger/Module.php');
// $moduleName='PurchaseOrder';
// $moduleInstance = Vtiger_Module::getInstance($moduleName);
// $blockInstance = Vtiger_Block::getInstance('Product Details', $moduleInstance);
// $fieldInstance = new Vtiger_Field();
// $fieldInstance->name = 'cf_755';
// $fieldInstance->table = $moduleInstance->basetable;
// $fieldInstance->column = 'cf_755';
// $fieldInstance->label='Roof Type';
// $fieldInstance->columntype = 'VARCHAR(100)';
// $fieldInstance->uitype = 16;
// $fieldInstance->typeofdata = 'V~O';
// $blockInstance->addField($fieldInstance);
// $dayOfTheWeek->setPicklistValues(array('concrete roof','corrugated roof','Tile Roof','Tin roof','Tin flat roof','Ground Mount'));



