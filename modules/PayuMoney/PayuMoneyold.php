<?php
/***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class PayuMoney extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_payumoney';
	var $table_index= 'payumoneyid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_payumoneycf', 'payumoneyid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_payumoney', 'vtiger_payumoneycf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_payumoney' => 'payumoneyid',
		'vtiger_payumoneycf'=>'payumoneyid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		'LBL_PAYMENT_NO' => array('payumoney', 'payment_no'),

	);
	var $list_fields_name = Array (
		'LBL_PAYMENT_NO' => 'payment_no',

	);

	// Make the field link to detail view
	var $list_link_field = 'payment_no';

	// For Popup listview and UI type support
	var $search_fields = Array(

	);
	var $search_fields_name = Array (

	);

	// For Popup window record selection
	var $popup_fields = Array ('payment_no');

	// For Alphabetical search
	var $def_basicsearch_col = 'payment_no';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'payment_no';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('payment_no','assigned_user_id');

	var $default_order_by = 'payment_no';
	var $default_sort_order='ASC';

	function PayuMoney() {
		$this->log =LoggerManager::getLogger('PayuMoney');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('PayuMoney');
	}

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
 		if($eventType == 'module.postinstall') {
 			//Enable ModTracker for the module
 			static::enableModTracker($moduleName);
			//Create Related Lists
			static::createRelatedLists();
		} else if($eventType == 'module.disabled') {
			// Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			//Create Related Lists
			static::createRelatedLists();
		}
 	}
	
	/**
	 * Enable ModTracker for the module
	 */
	public static function enableModTracker($moduleName)
	{
		include_once 'vtlib/Vtiger/Module.php';
		include_once 'modules/ModTracker/ModTracker.php';
			
		//Enable ModTracker for the module
		$moduleInstance = Vtiger_Module::getInstance($moduleName);
		ModTracker::enableTrackingForModule($moduleInstance->getId());
	}
	
	protected static function createRelatedLists()
	{
		include_once('vtlib/Vtiger/Module.php');	

		$moduleInstance = Vtiger_Module::getInstance('Products');
		$relatedModuleInstance = Vtiger_Module::getInstance('PayuMoney');
		$relationLabel = 'LBL_PAYUMONEY_LIST';
		$moduleInstance->setRelatedList(
			$relatedModuleInstance, $relationLabel, array('ADD'), 'get_dependents_list'
		);

		$moduleInstance = Vtiger_Module::getInstance('Services');
		$relatedModuleInstance = Vtiger_Module::getInstance('PayuMoney');
		$relationLabel = 'LBL_PAYUMONEY_LIST';
		$moduleInstance->setRelatedList(
			$relatedModuleInstance, $relationLabel, array('ADD'), 'get_dependents_list'
		);

	}
}