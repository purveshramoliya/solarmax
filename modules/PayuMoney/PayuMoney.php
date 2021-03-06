<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/
/*********************************************************************************
 * $Header$
 * Description:  Defines the Account SugarBean Account entity with the necessary
 * methods and variables.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
class PayuMoney extends CRMEntity {
	var $log;
	var $db;

	var $table_name = "vtiger_payumoney";
	var $table_index= 'payumoneyid';
	var $tab_name = Array('vtiger_crmentity','vtiger_payumoney','vtiger_paobillads','vtiger_paoshipads','vtiger_payumoneycf','vtiger_invoice_recurring_info','vtiger_inventoryproductrel');
	var $tab_name_index = Array('vtiger_crmentity'=>'crmid','vtiger_payumoney'=>'payumoneyid','vtiger_paobillads'=>'paobilladdressid','vtiger_paoshipads'=>'paoshipaddressid','vtiger_payumoneycf'=>'payumoneyid','vtiger_invoice_recurring_info'=>'salesorderid','vtiger_inventoryproductrel'=>'id');
	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_payumoneycf', 'payumoneyid');
	var $entity_table = "vtiger_crmentity";

	var $billadr_table = "vtiger_paobillads";

	var $object_name = "PayuMoney";

	var $new_schema = true;

	var $update_product_array = Array();

	var $column_fields = Array();

	var $sortby_fields = Array('subject','smownerid','accountname','lastname');

	// This is used to retrieve related vtiger_fields from form posts.
	var $additional_column_fields = Array('assigned_user_name', 'smownerid', 'opportunity_id', 'case_id', 'contact_id', 'task_id', 'note_id', 'meeting_id', 'call_id', 'email_id', 'parent_name', 'member_id' );

	// This is the list of vtiger_fields that are in the lists.
	var $list_fields = Array(
				// Module Sequence Numbering
				//'Order No'=>Array('crmentity'=>'crmid'),
				'Order No'=>Array('payumoney','payment_no'),
				// END
			//	'Subject'=>Array('payumoney'=>'subject'),
				'Contact Name'=>Array('contact'=>'contactid'),
				//'Invoice Number'=>Array('payumoneycf'=>'cf_896'),
				'Total'=>Array('payumoney'=>'subtotal'),
				'Assigned To'=>Array('crmentity'=>'smownerid')
				);

	var $list_fields_name = Array(
				        'Order No'=>'payment_no',
				      //  'Subject'=>'subject',
				        'Contact Name'=>'contact_id',
				      //  'Invoice Number'=>'cf_896',
				     	'Total'=>'hdnGrandTotal',
				        'Assigned To'=>'assigned_user_id'
				      );
	var $list_link_field= 'subject';


	var $search_fields = Array(
				'Order No'=>Array('payumoney'=>'payumoney_no'),
				'Subject'=>Array('payumoney'=>'subject'),
				'Account Name'=>Array('account'=>'accountid'),
				'Quote Name'=>Array('payumoney'=>'quoteid')
				);

	var $search_fields_name = Array(
					'Order No'=>'payumoney_no',
				        'Subject'=>'subject',
				        'Account Name'=>'account_id',
				        'Quote Name'=>'quote_id'
				      );

	// This is the list of vtiger_fields that are required.
	var $required_fields =  array("accountname"=>1);

	//Added these variables which are used as default order by and sortorder in ListView
	var $default_order_by = 'subject';
	var $default_sort_order = 'ASC';
	//var $groupTable = Array('vtiger_sogrouprelation','payumoneyid');

	var $mandatory_fields = Array('subject','createdtime' ,'modifiedtime', 'assigned_user_id');

	// For Alphabetical search
	var $def_basicsearch_col = 'subject';

	// For workflows update field tasks is deleted all the lineitems.
	var $isLineItemUpdate = true;

	/** Constructor Function for SalesOrder class
	 *  This function creates an instance of LoggerManager class using getLogger method
	 *  creates an instance for PearDatabase class and get values for column_fields array of SalesOrder class.
	 */
	function PayuMoney() {
		$this->log =LoggerManager::getLogger('PayuMoney');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('PayuMoney');
	}

	function save_module($module)
	{
	    global $adb;
	    $invno=$_REQUEST['cf_896'];
	    



		//Checking if quote_id is present and updating the quote status
		if($this->column_fields["quote_id"] != '')
		{
        		$qt_id = $this->column_fields["quote_id"];
        		$query1 = "update vtiger_quotes set quotestage='Accepted' where quoteid=?";
        		$this->db->pquery($query1, array($qt_id));
		}

		//in ajax save we should not call this function, because this will delete all the existing product values
		if($_REQUEST['action'] != 'PayuMoneyAjax' && $_REQUEST['ajxaction'] != 'DETAILVIEW'
				&& $_REQUEST['action'] != 'MassEditSave' && $_REQUEST['action'] != 'ProcessDuplicates'
				&& $_REQUEST['action'] != 'SaveAjax' && $this->isLineItemUpdate != false) {
			//Based on the total Number of rows we will save the product relationship with this entity
			saveInventoryProductDetails($this, 'PayuMoney');
		}

		// Update the currency id and the conversion rate for the sales order
		$update_query = "update vtiger_payumoney set currency_id=?, conversion_rate=? where payumoneyid=?";
		$update_params = array($this->column_fields['currency_id'], $this->column_fields['conversion_rate'], $this->id);
		$this->db->pquery($update_query, $update_params);
	     $total=$adb->pquery("select sum(total) from vtiger_invoice i inner join vtiger_crmentity c on i.invoiceid=c.crmid where i.invoice_no='$invno' and c.deleted=0");
	    $itotal=$adb->query_result($total);
	    
	   $paid=$adb->pquery("select sum(subtotal) from vtiger_payumoney p inner join vtiger_crmentity c on p.payumoneyid=c.crmid inner join vtiger_payumoneycf pc on pc.payumoneyid=p.payumoneyid where pc.cf_896='$invno' and c.deleted=0");
	    $ppaid=$adb->query_result($paid);
	
	    $balance=$itotal-$ppaid;
	    
	    $adb->pquery("update vtiger_invoice set received='$ppaid',balance='$balance' where invoice_no='$invno'");
	}

	/** Function to get activities associated with the Sales Order
	 *  This function accepts the id as arguments and execute the MySQL query using the id
	 *  and sends the query and the id as arguments to renderRelatedActivities() method
	 */
	function get_activities($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_activities(".$id.") method ...");
		$this_module = $currentModule;

        $related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/Activity.php");
		$other = new Activity();
        vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';

		$button .= '<input type="hidden" name="activity_mode">';

		if($actions) {
			if(is_string($actions)) $actions = explode(',', strtoupper($actions));
			if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
				if(getFieldVisibilityPermission('Calendar',$current_user->id,'parent_id', 'readwrite') == '0') {
					$button .= "<input title='".getTranslatedString('LBL_NEW'). " ". getTranslatedString('LBL_TODO', $related_module) ."' class='crmbutton small create'" .
						" onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\";this.form.return_module.value=\"$this_module\";this.form.activity_mode.value=\"Task\";' type='submit' name='button'" .
						" value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString('LBL_TODO', $related_module) ."'>&nbsp;";
				}
			}
		}

		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
							'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "SELECT case when (vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname end as user_name,vtiger_contactdetails.lastname, vtiger_contactdetails.firstname, vtiger_contactdetails.contactid, vtiger_activity.*,vtiger_seactivityrel.crmid as parent_id,vtiger_crmentity.crmid, vtiger_crmentity.smownerid, vtiger_crmentity.modifiedtime from vtiger_activity inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid=vtiger_activity.activityid inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_activity.activityid left join vtiger_cntactivityrel on vtiger_cntactivityrel.activityid= vtiger_activity.activityid left join vtiger_contactdetails on vtiger_contactdetails.contactid = vtiger_cntactivityrel.contactid left join vtiger_users on vtiger_users.id=vtiger_crmentity.smownerid left join vtiger_groups on vtiger_groups.groupid=vtiger_crmentity.smownerid where vtiger_seactivityrel.crmid=".$id." and activitytype='Task' and vtiger_crmentity.deleted=0 and (vtiger_activity.status is not NULL and vtiger_activity.status != 'Completed') and (vtiger_activity.status is not NULL and vtiger_activity.status !='Deferred')";

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_activities method ...");
		return $return_value;
	}

	/** Function to get the activities history associated with the Sales Order
	 *  This function accepts the id as arguments and execute the MySQL query using the id
	 *  and sends the query and the id as arguments to renderRelatedHistory() method
	 */
	function get_history($id)
	{
		global $log;
		$log->debug("Entering get_history(".$id.") method ...");
		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
							'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "SELECT vtiger_contactdetails.lastname, vtiger_contactdetails.firstname,
			vtiger_contactdetails.contactid,vtiger_activity.*, vtiger_seactivityrel.*,
			vtiger_crmentity.crmid, vtiger_crmentity.smownerid, vtiger_crmentity.modifiedtime,
			vtiger_crmentity.createdtime, vtiger_crmentity.description, case when
			(vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname
			end as user_name from vtiger_activity
				inner join vtiger_seactivityrel on vtiger_seactivityrel.activityid=vtiger_activity.activityid
				inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_activity.activityid
				left join vtiger_cntactivityrel on vtiger_cntactivityrel.activityid= vtiger_activity.activityid
				left join vtiger_contactdetails on vtiger_contactdetails.contactid = vtiger_cntactivityrel.contactid
                                left join vtiger_groups on vtiger_groups.groupid=vtiger_crmentity.smownerid
				left join vtiger_users on vtiger_users.id=vtiger_crmentity.smownerid
			where activitytype='Task'
				and (vtiger_activity.status = 'Completed' or vtiger_activity.status = 'Deferred')
				and vtiger_seactivityrel.crmid=".$id."
                                and vtiger_crmentity.deleted = 0";
		//Don't add order by, because, for security, one more condition will be added with this query in include/RelatedListView.php

		$log->debug("Exiting get_history method ...");
		return getHistory('PayuMoney',$query,$id);
	}



	/** Function to get the invoices associated with the Sales Order
	 *  This function accepts the id as arguments and execute the MySQL query using the id
	 *  and sends the query and the id as arguments to renderRelatedInvoices() method.
	 */
	function get_invoices($id)
	{
		global $log,$singlepane_view;
		$log->debug("Entering get_invoices(".$id.") method ...");
		require_once('modules/Invoice/Invoice.php');

		$focus = new Invoice();

		$button = '';
		if($singlepane_view == 'true')
			$returnset = '&return_module=PayuMoney&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module=PayuMoney&return_action=CallRelatedList&return_id='.$id;

		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>
							'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');
		$query = "select vtiger_crmentity.*, vtiger_invoice.*, vtiger_account.accountname,
			vtiger_payumoney.subject as salessubject, case when
			(vtiger_users.user_name not like '') then $userNameSql else vtiger_groups.groupname
			end as user_name from vtiger_invoice
			inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_invoice.invoiceid
			left outer join vtiger_account on vtiger_account.accountid=vtiger_invoice.accountid
			inner join vtiger_payumoney on vtiger_payumoney.payumoneyid=vtiger_invoice.payumoneyid
            LEFT JOIN vtiger_invoicecf ON vtiger_invoicecf.invoiceid = vtiger_invoice.invoiceid
			LEFT JOIN vtiger_invoicebillads ON vtiger_invoicebillads.invoicebilladdressid = vtiger_invoice.invoiceid
			LEFT JOIN vtiger_invoiceshipads ON vtiger_invoiceshipads.invoiceshipaddressid = vtiger_invoice.invoiceid
			left join vtiger_users on vtiger_users.id=vtiger_crmentity.smownerid
			left join vtiger_groups on vtiger_groups.groupid=vtiger_crmentity.smownerid
			where vtiger_crmentity.deleted=0 and vtiger_payumoney.payumoneyid=".$id;

		$log->debug("Exiting get_invoices method ...");
		return GetRelatedList('PayuMoney','Invoice',$focus,$query,$button,$returnset);

	}

	/**	Function used to get the Status history of the Sales Order
	 *	@param $id - salesorder id
	 *	@return $return_data - array with header and the entries in format Array('header'=>$header,'entries'=>$entries_list) where as $header and $entries_list are arrays which contains header values and all column values of all entries
	 */
	function get_sostatushistory($id)
	{
		global $log;
		$log->debug("Entering get_sostatushistory(".$id.") method ...");

		global $adb;
		global $mod_strings;
		global $app_strings;

		$query = 'select vtiger_sostatushistory.*, vtiger_payumoney.payumoney_no from vtiger_sostatushistory inner join vtiger_payumoney on vtiger_payumoney.payumoneyid = vtiger_sostatushistory.payumoneyid inner join vtiger_crmentity on vtiger_crmentity.crmid = vtiger_payumoney.payumoneyid where vtiger_crmentity.deleted = 0 and vtiger_payumoney.payumoneyid = ?';
		$result=$adb->pquery($query, array($id));
		$noofrows = $adb->num_rows($result);

		$header[] = $app_strings['Order No'];
		$header[] = $app_strings['LBL_ACCOUNT_NAME'];
		$header[] = $app_strings['LBL_AMOUNT'];
		$header[] = $app_strings['LBL_SO_STATUS'];
		$header[] = $app_strings['LBL_LAST_MODIFIED'];

		//Getting the field permission for the current user. 1 - Not Accessible, 0 - Accessible
		//Account Name , Total are mandatory fields. So no need to do security check to these fields.
		global $current_user;

		//If field is accessible then getFieldVisibilityPermission function will return 0 else return 1
		$sostatus_access = (getFieldVisibilityPermission('PayuMoney', $current_user->id, 'sostatus') != '0')? 1 : 0;
		$picklistarray = getAccessPickListValues('PayuMoney');

		$sostatus_array = ($sostatus_access != 1)? $picklistarray['sostatus']: array();
		//- ==> picklist field is not permitted in profile
		//Not Accessible - picklist is permitted in profile but picklist value is not permitted
		$error_msg = ($sostatus_access != 1)? 'Not Accessible': '-';

		while($row = $adb->fetch_array($result))
		{
			$entries = Array();

			// Module Sequence Numbering
			//$entries[] = $row['payumoneyid'];
			$entries[] = $row['payumoney_no'];
			// END
			$entries[] = $row['accountname'];
			$entries[] = $row['total'];
			$entries[] = (in_array($row['sostatus'], $sostatus_array))? $row['sostatus']: $error_msg;
			$date = new DateTimeField($row['lastmodified']);
			$entries[] = $date->getDisplayDateTimeValue();

			$entries_list[] = $entries;
		}

		$return_data = Array('header'=>$header,'entries'=>$entries_list);

	 	$log->debug("Exiting get_sostatushistory method ...");

		return $return_data;
	}

	/*
	 * Function to get the secondary query part of a report
	 * @param - $module primary module name
	 * @param - $secmodule secondary module name
	 * returns the query string formed on fetching the related data for report for secondary module
	 */
	function generateReportsSecQuery($module,$secmodule,$queryPlanner){
		$matrix = $queryPlanner->newDependencyMatrix();
		$matrix->setDependency('vtiger_crmentityPayuMoney', array('vtiger_usersPayuMoney', 'vtiger_PayuMoney', 'vtiger_lastModifiedByPayuMoney'));
		$matrix->setDependency('vtiger_inventoryproductrelPayuMoney', array('vtiger_productsPayuMoney', 'vtiger_servicePayuMoney'));
		$matrix->setDependency('vtiger_payumoney',array('vtiger_crmentityPayuMoney', "vtiger_currency_info$secmodule",
				'vtiger_payumoneycf', 'vtiger_potentialRelPayuMoney', 'vtiger_paobillads','vtiger_paoshipads',
				'vtiger_inventoryproductrelPayuMoney', 'vtiger_contactdetailsPayuMoney', 'vtiger_accountPayuMoney',
				'vtiger_invoice_recurring_info','vtiger_quotesPayuMoney'));

		if (!$queryPlanner->requireTable('vtiger_payumoney', $matrix)) {
			return '';
		}

		$query = $this->getRelationQuery($module,$secmodule,"vtiger_payumoney","payumoneyid", $queryPlanner);
		if ($queryPlanner->requireTable("vtiger_crmentityPayuMoney",$matrix)){
			$query .= " left join vtiger_crmentity as vtiger_crmentityPayuMoney on vtiger_crmentityPayuMoney.crmid=vtiger_payumoney.payumoneyid and vtiger_crmentityPayuMoney.deleted=0";
		}
		if ($queryPlanner->requireTable("vtiger_payumoneycf")){
			$query .= " left join vtiger_payumoneycf on vtiger_payumoney.payumoneyid = vtiger_payumoneycf.payumoneyid";
		}
		if ($queryPlanner->requireTable("vtiger_paobillads")){
			$query .= " left join vtiger_paobillads on vtiger_payumoney.payumoneyid=vtiger_paobillads.paobilladdressid";
		}
		if ($queryPlanner->requireTable("vtiger_paoshipads")){
			$query .= " left join vtiger_paoshipads on vtiger_payumoney.payumoneyid=vtiger_paoshipads.paoshipaddressid";
		}
		if ($queryPlanner->requireTable("vtiger_currency_info$secmodule")){
			$query .= " left join vtiger_currency_info as vtiger_currency_info$secmodule on vtiger_currency_info$secmodule.id = vtiger_payumoney.currency_id";
		}
		if ($queryPlanner->requireTable("vtiger_inventoryproductrelPayuMoney", $matrix)){
			$query .= " left join vtiger_inventoryproductrel as vtiger_inventoryproductrelPayuMoney on vtiger_payumoney.payumoneyid = vtiger_inventoryproductrelPayuMoney.id";
            // To Eliminate duplicates in reports
            if(($module == 'Products' || $module == 'Services') && $secmodule == "PayuMoney"){
                if($module == 'Products'){
                    $query .= " and vtiger_inventoryproductrelPayuMoney.productid = vtiger_products.productid ";    
                }else if($module == 'Services'){
                    $query .= " and vtiger_inventoryproductrelPayuMoney.productid = vtiger_service.serviceid "; 
                }
            }
		}
		if ($queryPlanner->requireTable("vtiger_productsPayuMoney")){
			$query .= " left join vtiger_products as vtiger_productsPayuMoney on vtiger_productsPayuMoney.productid = vtiger_inventoryproductrelPayuMoney.productid";
		}
		if ($queryPlanner->requireTable("vtiger_servicePayuMoney")){
			$query .= " left join vtiger_service as vtiger_servicePayuMoney on vtiger_servicePayuMoney.serviceid = vtiger_inventoryproductrelPayuMoney.productid";
		}
		if ($queryPlanner->requireTable("vtiger_groupsPayuMoney")){
			$query .= " left join vtiger_groups as vtiger_groupsPayuMoney on vtiger_groupsPayuMoney.groupid = vtiger_crmentityPayuMoney.smownerid";
		}
		if ($queryPlanner->requireTable("vtiger_usersPayuMoney")){
			$query .= " left join vtiger_users as vtiger_usersPayuMoney on vtiger_usersPayuMoney.id = vtiger_crmentityPayuMoney.smownerid";
		}
		if ($queryPlanner->requireTable("vtiger_potentialRelPayuMoney")){
			$query .= " left join vtiger_potential as vtiger_potentialRelPayuMoney on vtiger_potentialRelPayuMoney.potentialid = vtiger_payumoney.potentialid";
		}
		if ($queryPlanner->requireTable("vtiger_contactdetailsPayuMoney")){
			$query .= " left join vtiger_contactdetails as vtiger_contactdetailsPayuMoney on vtiger_payumoney.contactid = vtiger_contactdetailsPayuMoney.contactid";
		}
		if ($queryPlanner->requireTable("vtiger_invoice_recurring_info")){
			$query .= " left join vtiger_invoice_recurring_info on vtiger_payumoney.payumoneyid = vtiger_invoice_recurring_info.salesorderid";
		}
		if ($queryPlanner->requireTable("vtiger_quotesPayuMoney")){
			$query .= " left join vtiger_quotes as vtiger_quotesPayuMoney on vtiger_payumoney.quoteid = vtiger_quotesPayuMoney.quoteid";
		}
		if ($queryPlanner->requireTable("vtiger_accountPayuMoney")){
			$query .= " left join vtiger_account as vtiger_accountPayuMoney on vtiger_accountPayuMoney.accountid = vtiger_payumoney.accountid";
		}
		if ($queryPlanner->requireTable("vtiger_lastModifiedByPayuMoney")){
			$query .= " left join vtiger_users as vtiger_lastModifiedByPayuMoney on vtiger_lastModifiedByPayuMoney.id = vtiger_crmentityPayuMoney.modifiedby ";
		}
        if ($queryPlanner->requireTable("vtiger_createdbyPayuMoney")){
			$query .= " left join vtiger_users as vtiger_createdbyPayuMoney on vtiger_createdbyPayuMoney.id = vtiger_crmentityPayuMoney.smcreatorid ";
		}
		return $query;
	}

	/*
	 * Function to get the relation tables for related modules
	 * @param - $secmodule secondary module name
	 * returns the array with table names and fieldnames storing relations between module and this module
	 */
	function setRelationTables($secmodule){
		$rel_tables = array (
			"Calendar" =>array("vtiger_seactivityrel"=>array("crmid","activityid"),"vtiger_payumoney"=>"payumoneyid"),
			"Invoice" =>array("vtiger_invoice"=>array("payumoneyid","invoiceid"),"vtiger_payumoney"=>"payumoneyid"),
			"Documents" => array("vtiger_senotesrel"=>array("crmid","notesid"),"vtiger_payumoney"=>"payumoneyid"),
		);
		return $rel_tables[$secmodule];
	}

	// Function to unlink an entity with given Id from another entity
	function unlinkRelationship($id, $return_module, $return_id) {
		global $log;
		if(empty($return_module) || empty($return_id)) return;

		if($return_module == 'Accounts') {
			$this->trash('PayuMoney',$id);
		}
		elseif($return_module == 'Quotes') {
			$relation_query = 'UPDATE vtiger_payumoney SET quoteid=? WHERE payumoneyid=?';
			$this->db->pquery($relation_query, array(null, $id));
		}
		elseif($return_module == 'Potentials') {
			$relation_query = 'UPDATE vtiger_payumoney SET potentialid=? WHERE payumoneyid=?';
			$this->db->pquery($relation_query, array(null, $id));
		}
		elseif($return_module == 'Contacts') {
			$relation_query = 'UPDATE vtiger_payumoney SET contactid=? WHERE payumoneyid=?';
			$this->db->pquery($relation_query, array(null, $id));
		} else {
			$sql = 'DELETE FROM vtiger_crmentityrel WHERE (crmid=? AND relmodule=? AND relcrmid=?) OR (relcrmid=? AND module=? AND crmid=?)';
			$params = array($id, $return_module, $return_id, $id, $return_module, $return_id);
			$this->db->pquery($sql, $params);
		}
	}

	public function getJoinClause($tableName) {
		if ($tableName == 'vtiger_invoice_recurring_info') {
			return 'LEFT JOIN';
		}
		return parent::getJoinClause($tableName);
	}

	function insertIntoEntityTable($table_name, $module, $fileid = '')  {
		//Ignore relation table insertions while saving of the record
		if($table_name == 'vtiger_inventoryproductrel') {
			return;
		}
		parent::insertIntoEntityTable($table_name, $module, $fileid);
	}

	/*Function to create records in current module.
	**This function called while importing records to this module*/
	function createRecords($obj) {
		$createRecords = createRecords($obj);
		return $createRecords;
	}

	/*Function returns the record information which means whether the record is imported or not
	**This function called while importing records to this module*/
	function importRecord($obj, $inventoryFieldData, $lineItemDetails) {
		$entityInfo = importRecord($obj, $inventoryFieldData, $lineItemDetails);
		return $entityInfo;
	}

	/*Function to return the status count of imported records in current module.
	**This function called while importing records to this module*/
	function getImportStatusCount($obj) {
		$statusCount = getImportStatusCount($obj);
		return $statusCount;
	}

	function undoLastImport($obj, $user) {
		$undoLastImport = undoLastImport($obj, $user);
	}

	/** Function to export the lead records in CSV Format
	* @param reference variable - where condition is passed when the query is executed
	* Returns Export SalesOrder Query.
	*/
	function create_export_query($where)
	{
		global $log;
		global $current_user;
		$log->debug("Entering create_export_query(".$where.") method ...");

		include("include/utils/ExportUtils.php");

		//To get the Permitted fields query and the permitted fields list
		$sql = getPermittedFieldsQuery("PayuMoney", "detail_view");
		$fields_list = getFieldsListFromQuery($sql);
		$fields_list .= getInventoryFieldsForExport($this->table_name);
		$userNameSql = getSqlForNameInDisplayFormat(array('first_name'=>'vtiger_users.first_name', 'last_name' => 'vtiger_users.last_name'), 'Users');

		$query = "SELECT $fields_list FROM ".$this->entity_table."
				INNER JOIN vtiger_payumoney ON vtiger_payumoney.payumoneyid = vtiger_crmentity.crmid
				LEFT JOIN vtiger_payumoneycf ON vtiger_payumoneycf.payumoneyid = vtiger_payumoney.payumoneyid
				LEFT JOIN vtiger_paobillads ON vtiger_paobillads.paobilladdressid = vtiger_payumoney.payumoneyid
				LEFT JOIN vtiger_paoshipads ON vtiger_paoshipads.paoshipaddressid = vtiger_payumoney.payumoneyid
				LEFT JOIN vtiger_inventoryproductrel ON vtiger_inventoryproductrel.id = vtiger_payumoney.payumoneyid
				LEFT JOIN vtiger_products ON vtiger_products.productid = vtiger_inventoryproductrel.productid
				LEFT JOIN vtiger_service ON vtiger_service.serviceid = vtiger_inventoryproductrel.productid
				LEFT JOIN vtiger_contactdetails ON vtiger_contactdetails.contactid = vtiger_payumoney.contactid
				LEFT JOIN vtiger_invoice_recurring_info ON vtiger_invoice_recurring_info.salesorderid = vtiger_payumoney.payumoneyid
				LEFT JOIN vtiger_potential ON vtiger_potential.potentialid = vtiger_payumoney.potentialid
				LEFT JOIN vtiger_account ON vtiger_account.accountid = vtiger_payumoney.accountid
				LEFT JOIN vtiger_currency_info ON vtiger_currency_info.id = vtiger_payumoney.currency_id
				LEFT JOIN vtiger_quotes ON vtiger_quotes.quoteid = vtiger_payumoney.quoteid
				LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid
				LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid";

		$query .= $this->getNonAdminAccessControlQuery('PayuMoney',$current_user);
		$where_auto = " vtiger_crmentity.deleted=0";

		if($where != "") {
			$query .= " where ($where) AND ".$where_auto;
		} else {
			$query .= " where ".$where_auto;
		}

		$log->debug("Exiting create_export_query method ...");
		return $query;
	}

    /**
	 * Function which will give the basic query to find duplicates
	 * @param <String> $module
	 * @param <String> $tableColumns
	 * @param <String> $selectedColumns
	 * @param <Boolean> $ignoreEmpty
	 * @return string
	 */
	// Note : remove getDuplicatesQuery API once vtiger5 code is removed
    function getQueryForDuplicates($module, $tableColumns, $selectedColumns = '', $ignoreEmpty = false) {
		if(is_array($tableColumns)) {
			$tableColumnsString = implode(',', $tableColumns);
		}
        $selectClause = "SELECT " . $this->table_name . "." . $this->table_index . " AS recordid," . $tableColumnsString;

        // Select Custom Field Table Columns if present
        if (isset($this->customFieldTable))
            $query .= ", " . $this->customFieldTable[0] . ".* ";

        $fromClause = " FROM $this->table_name";

        $fromClause .= " INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = $this->table_name.$this->table_index";

		if($this->tab_name) {
			foreach($this->tab_name as $tableName) {
				if($tableName != 'vtiger_crmentity' && $tableName != $this->table_name && $tableName != 'vtiger_inventoryproductrel') {
                    if($tableName == 'vtiger_invoice_recurring_info') {
						$fromClause .= " LEFT JOIN " . $tableName . " ON " . $tableName . '.' . $this->tab_name_index[$tableName] .
							" = $this->table_name.$this->table_index";
					}elseif($this->tab_name_index[$tableName]) {
						$fromClause .= " INNER JOIN " . $tableName . " ON " . $tableName . '.' . $this->tab_name_index[$tableName] .
							" = $this->table_name.$this->table_index";
					}
				}
			}
		}
        $fromClause .= " LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid
						LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid";

        $whereClause = " WHERE vtiger_crmentity.deleted = 0";
        $whereClause .= $this->getListViewSecurityParameter($module);

		if($ignoreEmpty) {
			foreach($tableColumns as $tableColumn){
				$whereClause .= " AND ($tableColumn IS NOT NULL AND $tableColumn != '') ";
			}
		}

        if (isset($selectedColumns) && trim($selectedColumns) != '') {
            $sub_query = "SELECT $selectedColumns FROM $this->table_name AS t " .
                    " INNER JOIN vtiger_crmentity AS crm ON crm.crmid = t." . $this->table_index;
            // Consider custom table join as well.
            if (isset($this->customFieldTable)) {
                $sub_query .= " LEFT JOIN " . $this->customFieldTable[0] . " tcf ON tcf." . $this->customFieldTable[1] . " = t.$this->table_index";
            }
            $sub_query .= " WHERE crm.deleted=0 GROUP BY $selectedColumns HAVING COUNT(*)>1";
        } else {
            $sub_query = "SELECT $tableColumnsString $fromClause $whereClause GROUP BY $tableColumnsString HAVING COUNT(*)>1";
        }

		$i = 1;
		foreach($tableColumns as $tableColumn){
			$tableInfo = explode('.', $tableColumn);
			$duplicateCheckClause .= " ifnull($tableColumn,'null') = ifnull(temp.$tableInfo[1],'null')";
			if (count($tableColumns) != $i++) $duplicateCheckClause .= " AND ";
		}

        $query = $selectClause . $fromClause .
                " LEFT JOIN vtiger_users_last_import ON vtiger_users_last_import.bean_id=" . $this->table_name . "." . $this->table_index .
                " INNER JOIN (" . $sub_query . ") AS temp ON " . $duplicateCheckClause .
                $whereClause .
                " ORDER BY $tableColumnsString," . $this->table_name . "." . $this->table_index . " ASC";
        return $query;
    }

}

?>
