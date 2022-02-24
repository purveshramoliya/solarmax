<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

/**
 * PurchaseOrder Record Model Class
 */
class PurchaseOrder_Record_Model extends Inventory_Record_Model {
	
	/**
	 * This Function adds the specified product quantity to the Product Quantity in Stock
	 * @param type $recordId
	 */
	function addStockToProducts($recordId) {
		$db = PearDatabase::getInstance();

		$recordModel = Inventory_Record_Model::getInstanceById($recordId);
		$relatedProducts = $recordModel->getProducts();

		foreach ($relatedProducts as $key => $relatedProduct) {
			if($relatedProduct['qty'.$key]){
				$productId = $relatedProduct['hdnProductId'.$key];
				$result = $db->pquery("SELECT qtyinstock FROM vtiger_products WHERE productid=?", array($productId));
				$qty = $db->query_result($result,0,"qtyinstock");
				$stock = $qty + $relatedProduct['qty'.$key];
				$db->pquery("UPDATE vtiger_products SET qtyinstock=? WHERE productid=?", array($stock, $productId));
			}
		}
	}
	
	/**
	 * This Function returns the current status of the specified Purchase Order.
	 * @param type $purchaseOrderId
	 * @return <String> PurchaseOrderStatus
	 */
	function getPurchaseOrderStatus($purchaseOrderId){
			$db = PearDatabase::getInstance();
			$sql = "SELECT postatus FROM vtiger_purchaseorder WHERE purchaseorderid=?";
			$result = $db->pquery($sql, array($purchaseOrderId));
			$purchaseOrderStatus = $db->query_result($result,0,"postatus");
			return $purchaseOrderStatus;
	}

	public function getImageDetails() {
		$db = PearDatabase::getInstance();
		$imageDetails = array();
		$recordId = $this->getId();

		if ($recordId) {
			$sql = "SELECT vtiger_attachments.*, vtiger_crmentity.setype FROM vtiger_attachments
						INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid
						INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_attachments.attachmentsid
						WHERE vtiger_crmentity.setype = 'PurchaseOrder Attachment' AND vtiger_seattachmentsrel.crmid = ?";

			$result = $db->pquery($sql, array($recordId));
			$count = $db->num_rows($result);

			for($i=0; $i<$count; $i++) {
				$imageIdsList[] = $db->query_result($result, $i, 'attachmentsid');
				$imagePathList[] = $db->query_result($result, $i, 'path');
				$imageName = $db->query_result($result, $i, 'name');

				//decode_html - added to handle UTF-8 characters in file names
				$imageOriginalNamesList[] = decode_html($imageName);

				//urlencode - added to handle special characters like #, %, etc.,
				$imageNamesList[] = $imageName;
			}

			if(is_array($imageOriginalNamesList)) {
				$countOfImages = count($imageOriginalNamesList);
				for($j=0; $j<$countOfImages; $j++) {
					$imageDetails[] = array(
							'id' => $imageIdsList[$j],
							'orgname' => $imageOriginalNamesList[$j],
							'path' => $imagePathList[$j].$imageIdsList[$j],
							'name' => $imageNamesList[$j]
					);
				}
			}
		}
		return $imageDetails;
	}
}