<?php
/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_PDFContentUtils_Model extends Vtiger_Base_Model
{
    const SIGNATURE_HEIGHT = 60;
    const SIGNATURE_WIDTH = 150;
    private static $is_inventory_module = array();

    public function getOwnerNameCustom($id)
    {
        $db = PearDatabase::getInstance();
        if ($id != "") {
            $result = $db->pquery("SELECT user_name FROM vtiger_users WHERE id=?", array($id));
            $ownername = $db->query_result($result, 0, "user_name");
        }
        if ($ownername == "") {
            $result = $db->pquery("SELECT groupname FROM vtiger_groups WHERE groupid=?", array($id));
            $ownername = $db->query_result($result, 0, "groupname");
        } else {
            $ownername = getUserFullName($id);
        }
        return $ownername;
    }

    public function getAccountNo($account_id)
    {
        $accountno = "";
        if ($account_id != '') {
            $db = PearDatabase::getInstance();
            $result = $db->pquery("SELECT account_no FROM vtiger_account WHERE accountid=?", array($account_id));
            $accountno = $db->query_result($result, 0, "account_no");
        }
        return $accountno;
    }

    public function convertListViewBlock($content)
    {
        $simple_html_dom_file = $this->getSimpleHtmlDomFile();
        require_once($simple_html_dom_file);
        $html = str_get_html($content);
        if (is_array($html->find("td"))) {
            foreach ($html->find("td") as $td) {
                if (trim($td->plaintext) == "#LISTVIEWBLOCK_START#") {
                    $td->parent->outertext = "#LISTVIEWBLOCK_START#";
                }

                if (trim($td->plaintext) == "#LISTVIEWBLOCK_END#") {
                    $td->parent->outertext = "#LISTVIEWBLOCK_END#";
                }
            }
            $content = $html->save();
        }
        return $content;
    }

    public function getSimpleHtmlDomFile()
    {
        $simple_html_dom_file = "include/simplehtmldom/simple_html_dom.php";
        if (file_exists($simple_html_dom_file)) {
            return $simple_html_dom_file;
        } else {
            return "modules/PDFMaker/resources/classes/simple_html_dom.php";
        }
    }

    public function convertVatBlock($content)
    {
        $simple_html_dom_file = $this->getSimpleHtmlDomFile();
        require_once($simple_html_dom_file);
        $html = str_get_html($content);
        if (is_array($html->find("td"))) {
            foreach ($html->find("td") as $td) {
                if (trim($td->plaintext) == "#VATBLOCK_START#") {
                    $td->parent->outertext = "#VATBLOCK_START#";
                }
                if (trim($td->plaintext) == "#VATBLOCK_END#") {
                    $td->parent->outertext = "#VATBLOCK_END#";
                }
            }
            $content = $html->save();
        }
        return $content;
    }

    public function getUserValue($name, $data)
    {
        if (is_object($data)) {
            return $data->column_fields[$name];
        } elseif (isset($data[$name])) {
            return $data[$name];
        } else {
            return "";
        }
    }

    public function getUITypeName($uitype, $typeofdata)
    {
        $type = "";
        switch ($uitype) {
            case '19':
            case '20':
            case '21':
            case '24':
                $type = "textareas";
                break;
            case '5':
            case '6':
            case '23':
            case '70':
                $type = "datefields";
                break;
            case '15':
            case '16':
                $type = "picklists";
                break;
            case '56':
                $type = "checkboxes";
                break;
            case '33':
                $type = "multipicklists";
                break;
            case '71':
                $type = "currencyfields";
                break;
            case '9':
            case '72':
            case '83':
                $type = "numberfields";
                break;
            case '53':
            case '101':
                $type = "userfields";
                break;
            case '52':
                $type = "userorotherfields";
                break;
            case '10':
                $type = "related";
                break;
            case '7':
                if (substr($typeofdata, 0, 1) == "N") {
                    $type = "numberfields";
                }
                break;
        }
        return $type;
    }

    public function getDOMElementAtts($elm)
    {
        $atts_string = "";
        if ($elm != null) {
            foreach ($elm->attr as $attName => $attVal) {
                $atts_string .= $attName . '="' . $attVal . '" ';
            }
        }
        return $atts_string;
    }

    public function GetFieldModuleRel()
    {
        $db = PearDatabase::getInstance();
        $result = $db->pquery("SELECT fieldid, relmodule FROM vtiger_fieldmodulerel", array());
        $fieldModRel = array();
        while ($row = $db->fetchByAssoc($result)) {
            $fieldModRel[$row["fieldid"]][] = $row["relmodule"];
        }

        return $fieldModRel;
    }

    public function replaceBarcode($content)
    {
        $simple_html_dom_file = $this->getSimpleHtmlDomFile();
        require_once($simple_html_dom_file);
        $html = str_get_html($content);
        if (is_array($html->find("barcode"))) {
            foreach ($html->find("barcode") as $barcode) {
                $barcode->plaintext = str_replace("&amp;", "&", $barcode->plaintext);
                $params = explode("|", $barcode->plaintext);
                list($type, $code) = explode("=", $params[0], 2);
                $barcodeAtts = 'code="' . $code . '" type="' . $type . '" ';
                for ($i = 1; $i < count($params); $i++) {
                    list($attName, $attVal) = explode("=", $params[$i], 2);

                    $barcodeAtts .= strtolower($attName) . '="' . $attVal . '" ';
                }
                $barcode->outertext = '<barcode ' . $barcodeAtts . '/>';
            }
            $content = $html->save();
        }
        return $content;
    }

    public function fixImg($content)
    {
        $surl = vglobal("site_URL");
        $simple_html_dom_file = $this->getSimpleHtmlDomFile();
        require_once($simple_html_dom_file);

        $html = str_get_html($content);
        if (is_array($html->find("img"))) {
            foreach ($html->find("img") as $img) {
                if ($surl[strlen($surl) - 1] != "/") {
                    $surl .= "/";
                }

                if (strpos($img->src, $surl) === 0) {
                    $newPath = str_replace($surl, "", $img->src);
                    if (file_exists($newPath)) {
                        $img->src = $newPath;
                    }
                }
            }
            $content = $html->save();
        }
        return $content;
    }

    public function getInventoryBreaklines($id)
    {
        $db = PearDatabase::getInstance();
        $res = $db->pquery("SELECT productid, sequence, show_header, show_subtotal FROM vtiger_pdfmaker_breakline WHERE crmid=?", array($id));
        $products = array();
        $show_header = $show_subtotal = 0;
        while ($row = $db->fetchByAssoc($res)) {
            $products[$row["productid"] . "_" . $row["sequence"]] = $row["sequence"];
            $show_header = $row["show_header"];
            $show_subtotal = $row["show_subtotal"];
        }
        $output["products"] = $products;
        $output["show_header"] = $show_header;
        $output["show_subtotal"] = $show_subtotal;
        return $output;
    }

    public function getUserImage($id)
    {
        if (isset($id) and $id != "") {

            $db = PearDatabase::getInstance();
            $sql = "select vtiger_attachments.* from vtiger_attachments left join vtiger_salesmanattachmentsrel on vtiger_salesmanattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid where vtiger_salesmanattachmentsrel.smid=?";
            $image_res = $db->pquery($sql, array($id));
            $image_id = $db->query_result($image_res, 0, 'attachmentsid');
            $image_path = $db->query_result($image_res, 0, 'path');
            $image_name = $db->query_result($image_res, 0, 'name');

            $imgpath = $image_path . $image_id . "_" . $image_name;

            if ($image_name != '') {
                if (defined('STORAGE_ROOT')) {
                    $imgpath = STORAGE_ROOT . $imgpath;
                    $check = getimagesize($image_path);
                    $image_src = "data:" . $check["mime"] . ";base64," . base64_encode(file_get_contents($imgpath));

                } else {
                    $image_src = $imgpath;
                }
                $image = '<img src="' . $image_src . '" width="250px" border="0">';
            } else {
                $image = '';
            }
            return $image;
        } else {
            return "";
        }
    }

    public function getSettingsForId($templateid)
    {
        $db = PearDatabase::getInstance();
        $sql = "SELECT *, (margin_top * 10) AS margin_top,
                     (margin_bottom * 10) AS margin_bottom,
                     (margin_left * 10) AS margin_left,
                     (margin_right*10) AS margin_right
              FROM vtiger_pdfmaker_settings WHERE templateid = ?";
        $result = $db->pquery($sql, array($templateid));
        return $db->fetchByAssoc($result, 1);
    }

    public function getCustomfunctionParams($val)
    {
        $Params = array();
        $end = false;
        do {
            if (strstr($val, '|')) {
                if ($val[0] == '"') {
                    $delimiter = '"|';
                    $val = substr($val, 1);
                } elseif (substr($val, 0, 6) == '&quot;') {
                    $delimiter = '&quot;|';
                    $val = substr($val, 6);
                } else {
                    $delimiter = '|';
                }
                list($Params[], $val) = explode($delimiter, $val, 2);
            } else {
                $Params[] = $val;
                $end = true;
            }
        } while (!$end);
        return $Params;
    }

    public function getInventoryCurrencyInfoCustomArray($inventory_table, $inventory_id, $id)
    {

        $currency_info = array("currency_id" => "", "conversion_rate" => "", "currency_name" => "", "currency_code" => "", "currency_symbol" => "");
        if ($id != "") {
            $db = PearDatabase::getInstance();
            if ($inventory_table != "") {
                $sql = "SELECT currency_id, " . $inventory_table . ".conversion_rate AS conv_rate, vtiger_currency_info.* FROM " . $inventory_table . "
                               INNER JOIN vtiger_currency_info ON " . $inventory_table . ".currency_id = vtiger_currency_info.id
                               WHERE " . $inventory_id . "=?";
            } else {
                $sql = "SELECT vtiger_currency_info.*, id AS currency_id, '' AS conv_rate FROM vtiger_currency_info WHERE  vtiger_currency_info.id=?";
            }
            $res = $db->pquery($sql, array($id));
            $num_rows = $db->num_rows($res);
            if ($num_rows > 0) {
                $currency_info["currency_id"] = $db->query_result($res, 0, "currency_id");
                $currency_info["conversion_rate"] = $db->query_result($res, 0, "conv_rate");
                $currency_info["currency_name"] = $db->query_result($res, 0, "currency_name");
                $currency_info["currency_code"] = $db->query_result($res, 0, "currency_code");
                $currency_info["currency_symbol"] = $db->query_result($res, 0, "currency_symbol");
            }
        }
        return $currency_info;
    }

    public function getInventoryProductsQuery()
    {
        $query = "select case when vtiger_products.productid != '' then vtiger_products.productname else vtiger_service.servicename end as productname," .
            " case when vtiger_products.productid != '' then vtiger_products.productid else vtiger_service.serviceid end as psid," .
            " case when vtiger_products.productid != '' then vtiger_products.product_no else vtiger_service.service_no end as psno," .
            " case when vtiger_products.productid != '' then 'Products' else 'Services' end as entitytype," .
            " case when vtiger_products.productid != '' then vtiger_products.unit_price else vtiger_service.unit_price end as unit_price," .
            " case when vtiger_products.productid != '' then vtiger_products.usageunit else vtiger_service.service_usageunit end as usageunit," .
            " case when vtiger_products.productid != '' then vtiger_products.qty_per_unit else vtiger_service.qty_per_unit end as qty_per_unit," .
            " case when vtiger_products.productid != '' then vtiger_products.qtyinstock else 'NA' end as qtyinstock," .
            " case when vtiger_products.productid != '' then c1.description else c2.description end as psdescription, " .
            " vtiger_inventoryproductrel.productid as invproductid, " .
            " vtiger_inventoryproductrel.* " .
            " from vtiger_inventoryproductrel" .
            " left join vtiger_products on vtiger_products.productid=vtiger_inventoryproductrel.productid " .
            " left join vtiger_crmentity as c1 on c1.crmid = vtiger_products.productid " .
            " left join vtiger_service on vtiger_service.serviceid=vtiger_inventoryproductrel.productid " .
            " left join vtiger_crmentity as c2 on c2.crmid = vtiger_service.serviceid " .
            " where id = ? ORDER BY sequence_no";
        return $query;
    }

    public function getAttachmentImageQuery()
    {
        $query = "SELECT vtiger_attachments.path, vtiger_attachments.name, vtiger_attachments.attachmentsid
                FROM vtiger_seattachmentsrel
                INNER JOIN vtiger_attachments
                ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
                INNER JOIN vtiger_crmentity
                ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
                WHERE deleted=0 AND vtiger_attachments.attachmentsid=?";
        return $query;
    }

    public function getContactImage($id, $site_url = "")
    {
        if (isset($id) and $id != "") {
            $db = PearDatabase::getInstance();
            $query = $this->getContactImageQuery();
            $result = $db->pquery($query, array($id));
            $num_rows = $db->num_rows($result);
            if ($num_rows > 0) {

                $attachmentsid = $db->query_result($result, 0, "attachmentsid");

                $path = $db->query_result($result, 0, "path") . $attachmentsid . "_" . $db->query_result($result, 0, "name");

                if (defined('STORAGE_ROOT')) {
                    $image_path = STORAGE_ROOT . $path;
                    $check = getimagesize($image_path);
                    $image_src = "data:" . $check["mime"] . ";base64," . base64_encode(file_get_contents($image_path));

                } else {
                    $image_src = $site_url . ($site_url != "" ? "/" : "") . $path;
                }

                $image = "<img src='" . $image_src . "'/>";
                return $image;
            }
        } else {
            return "";
        }
    }

    public function getContactImageQuery()
    {
        $query = "SELECT vtiger_attachments.path, vtiger_attachments.name, vtiger_attachments.attachmentsid
                FROM vtiger_contactdetails
                INNER JOIN vtiger_seattachmentsrel
                ON vtiger_contactdetails.contactid=vtiger_seattachmentsrel.crmid
                INNER JOIN vtiger_attachments
                ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
                INNER JOIN vtiger_crmentity
                ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
                WHERE deleted=0 AND vtiger_contactdetails.contactid=?";
        return $query;
    }

    /**
     * @return array
     */
    public function getDefaultImageSize()
    {
        $defaultSize = array('height' => 0, 'width' => 100);

        if (method_exists($this, 'getSettings')) {
            $settings = $this->getSettings();
            $defaultSize['height'] = $settings['product_image_height'];

            if ($settings['product_image_width'] > 0) {
                $defaultSize['width'] = $settings['product_image_width'];
            }
        }

        return $defaultSize;
    }

    /**
     * @param array $image
     * @return array
     */
    public function getProductImageSize($image)
    {
        $imageSize = $this->getDefaultImageSize();

        if ($image['width'] > 0) {
            $imageSize['width'] = $image['width'];
        }
        if ($image['height'] > 0) {
            $imageSize['height'] = $image['height'];
        }

        return $imageSize;
    }

    public function getProductImage($productid, $site_url, $source_id = false, $sequence = "1", $isProductModule = false)
    {

        $retImage = "";
        if (!$source_id) {
            $source_id = $productid;
        }
        list($images, $bacImgs) = $this->getInventoryImages($source_id, $isProductModule);

        $imageKey = $productid . "_" . $sequence;
        $image = array();

        if (isset($images[$imageKey]) || isset($bacImgs[$imageKey])) {
            $product_image_width = $product_image_height = "";

            if (isset($images[$imageKey])) {
                $image = $images[$imageKey];
            } elseif (isset($bacImgs[$imageKey])) {
                $image = $bacImgs[$imageKey];
            }

            $imageSize = $this->getProductImageSize($image);

            if($imageSize['width'] > 0) {
                $product_image_width = ' width="' . $imageSize['width'] . '" ';
            }
            if($imageSize['height'] > 0) {
                $product_image_height = ' height="' . $imageSize['height'] . '" ';
            }

            if (defined('STORAGE_ROOT')) {
                $image_path = STORAGE_ROOT . $image["src"];
                $check = getimagesize($image_path);
                $image_src = "data:" . $check["mime"] . ";base64," . base64_encode(file_get_contents($image_path));

            } else {
                $image_src = $site_url . "/" . $image["src"];
            }
            $retImage = "<img src='" . $image_src . "' " . $product_image_width . $product_image_height . "/>";
        }
        return $retImage;
    }

    public function getInventoryImages($id, $isProductModule = false)
    {
        $db = PearDatabase::getInstance();
        $sql = $this->getInventoryImagesQuery($isProductModule);
        $mainImgs = $bacImgs = array();

        $res = $db->pquery($sql, array($id));
        $products = array();
        while ($row = $db->fetchByAssoc($res)) {
            $products[$row["productid"] . "#_#" . $row["sequence_no"]][$row["attachmentsid"]]["path"] = $row["path"];
            $products[$row["productid"] . "#_#" . $row["sequence_no"]][$row["attachmentsid"]]["name"] = $row["name"];
        }

        $saved_res = $db->pquery("SELECT productid, sequence, attachmentid, width, height FROM vtiger_pdfmaker_images WHERE crmid=?", array($id));
        $saved_products = array();
        $saved_wh = array();
        while ($saved_row = $db->fetchByAssoc($saved_res)) {
            $saved_products[$saved_row["productid"] . "_" . $saved_row["sequence"]] = $saved_row["attachmentid"];
            $saved_wh[$saved_row["productid"] . "_" . $saved_row["sequence"]]["width"] = ($saved_row["width"] > 0 ? $saved_row["width"] : "");
            $saved_wh[$saved_row["productid"] . "_" . $saved_row["sequence"]]["height"] = ($saved_row["height"] > 0 ? $saved_row["height"] : "");
        }

        foreach ($products as $productnameid => $data) {
            list($productid, $seq) = explode("#_#", $productnameid, 2);

            if (class_exists("Vtiger_ITS4YouImageDisplay_Action")) {
                $path = 'index.php?module=' . getSalesEntityType($productid) . '&action=ITS4YouImageDisplay&record=' . $productid;
            } else {
                $path = '';
            }

            foreach ($data as $attid => $images) {
                if ($attid != "") {

                    //if (!empty($path)) {
                    //    $image_path = $path.'&file='.$attid;
                    //} else {
                    $image_path = $images["path"] . $attid . '_' . $images["name"];
                    //}
                    if (isset($saved_products[$productid . "_" . $seq])) {
                        if ($saved_products[$productid . "_" . $seq] == $attid) {
                            $width = $saved_wh[$productid . "_" . $seq]["width"];
                            $height = $saved_wh[$productid . "_" . $seq]["height"];

                            $mainImgs[$productid . "_" . $seq]["src"] = $image_path;
                            $mainImgs[$productid . "_" . $seq]["width"] = $width;
                            $mainImgs[$productid . "_" . $seq]["height"] = $height;
                        }
                    } elseif (!isset($bacImgs[$productid . "_" . $seq])) {   // add only the first backup image
                        $bacImgs[$productid . "_" . $seq]["src"] = $image_path;
                    }
                }
            }
        }
        return array($mainImgs, $bacImgs);
    }

    public function getInventoryImagesQuery($isProductModule)
    {
        if ($isProductModule === false) {
            $query = "SELECT vtiger_inventoryproductrel.productid, vtiger_inventoryproductrel.sequence_no, vtiger_attachments.attachmentsid, name, path
                        FROM vtiger_inventoryproductrel
                        LEFT JOIN vtiger_seattachmentsrel
                        ON vtiger_seattachmentsrel.crmid=vtiger_inventoryproductrel.productid
                        LEFT JOIN vtiger_attachments
                        ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
                        INNER JOIN vtiger_crmentity
                        ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
                        WHERE vtiger_crmentity.deleted=0 AND vtiger_inventoryproductrel.id=?
                        ORDER BY vtiger_inventoryproductrel.sequence_no";
        } else {
            $query = "SELECT vtiger_products.productid, '1' AS sequence_no,
                    vtiger_attachments.attachmentsid, name, path
                    FROM vtiger_products
                    LEFT JOIN vtiger_seattachmentsrel
                    ON vtiger_seattachmentsrel.crmid=vtiger_products.productid
                    LEFT JOIN vtiger_attachments
                    ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
                    INNER JOIN vtiger_crmentity
                    ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
                    WHERE vtiger_crmentity.deleted=0 AND vtiger_products.productid=? ORDER BY vtiger_attachments.attachmentsid";
        }
        return $query;
    }

    public function getFieldValueUtils($efocus, $emodule, $fieldname, $value, $UITypes, $inventory_currency, $ignored_picklist_values, $def_charset, $decimals, $decimal_point, $thousands_separator, $language, $id)
    {

        $db = PearDatabase::getInstance();
        $res2 = $db->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($id));
        $CData = $db->fetchByAssoc($res2, 0);

        if (isset($CData["historized"]) && $CData["historized"] == "1") {
            $type = "e";
            $relid = $value;
            $fieldid = 0;
            if (in_array($fieldname, $UITypes["userorotherfields"]) || in_array($fieldname, $UITypes["userfields"])) {
                $type = "u";
                if (in_array($fieldname, $UITypes["userorotherfields"])) {
                    $culumnname = "smcreatorid";
                } else {
                    $culumnname = "smownerid";
                }
                $field_res = $db->pquery("SELECT fieldid FROM  vtiger_field WHERE tabid=("
                    . "SELECT tabid FROM  vtiger_tab WHERE name =
                                        (SELECT setype FROM vtiger_crmentity WHERE crmid = ?) ) AND columnname = ?", array($efocus->id, $culumnname));
                $fieldid = $db->query_result($field_res, 0, "fieldid");
                if ($efocus->id != $id) {
                    $relid = $efocus->id;
                }
            } else {
                if ($efocus->id == $id) {
                    $referenceModuleName = getSalesEntityType($value);
                    if ($referenceModuleName) {
                        $field_res = $db->pquery("SELECT fieldid FROM vtiger_field WHERE tablename=(SELECT tablename FROM vtiger_entityname WHERE modulename=?) "
                            . "AND fieldname=(SELECT fieldname FROM vtiger_entityname WHERE modulename=?)", array($referenceModuleName, $referenceModuleName));
                        $fieldid = $db->query_result($field_res, 0, "fieldid");
                    }
                } else {
                    if ($efocus->id) {
                        $field_res = $db->pquery("SELECT fieldid FROM vtiger_field WHERE tabid=(SELECT tabid FROM vtiger_tab WHERE name=(SELECT setype FROM vtiger_crmentity WHERE crmid = ?) ) "
                            . "AND fieldname=?", array($efocus->id, $fieldname));
                        $fieldid = $db->query_result($field_res, 0, "fieldid");
                        $relid = $efocus->id;
                    }
                }
            }
            if ($fieldid != 0) {
                $label_res = $db->pquery("SELECT label FROM its4you_historized WHERE crmid =? AND relid=? AND type=? AND field_id = ? ", array($id, $relid, $type, $fieldid));
                if ($label_res != false && $db->num_rows($label_res) != 0) {
                    return $db->query_result($label_res, 0, 'label');
                }
            }
        }

        $current_user = Users_Record_Model::getCurrentUserModel();
        $related_fieldnames = array("related_to", "relatedto", "parent_id", "parentid", "product_id", "productid", "service_id", "serviceid", "vendor_id", "product", "account", "invoiceid", "linktoaccountscontacts", "projectid", "sc_related_to");

        if (isset($UITypes["related"]) && count($UITypes["related"]) > 0) {
            foreach ($UITypes["related"] as $related_field) {
                if (!in_array($related_field, $related_fieldnames)) {
                    $related_fieldnames[] = $related_field;
                }
            }
        }

        if ($fieldname == "account_id") {
            $value = decode_html(getAccountName($value));
        } elseif ($fieldname == "potential_id") {
            $value = decode_html(getPotentialName($value));
        } elseif ($fieldname == "contact_id") {
            $value = decode_html(getContactName($value));
        } elseif ($fieldname == "quote_id") {
            $value = decode_html(getQuoteName($value));
        } elseif ($fieldname == "salesorder_id") {
            $value = decode_html(getSoName($value));
        } elseif ($fieldname == "campaignid") {
            $value = decode_html(getCampaignName($value));
        } elseif ($fieldname == "terms_conditions") {
            $value = $this->getTermsAndConditionsCustom($value);
        } elseif ($fieldname == "folderid") {
            $value = decode_html($this->getFolderName($value));
        } elseif ($fieldname == "time_start" || $fieldname == "time_end") {
            $curr_time = DateTimeField::convertToUserTimeZone($value);
            $value = $curr_time->format('H:i');
        } elseif (in_array($fieldname, $related_fieldnames)) {
            if ($value != "") {
                $parent_module = getSalesEntityType($value);
                $displayValueArray = getEntityName($parent_module, $value);

                if (!empty($displayValueArray)) {
                    foreach ($displayValueArray as $p_value) {
                        $value = decode_html($p_value);
                    }
                }
                if ($fieldname == "invoiceid" && $value == "0") {
                    $value = "";
                }
            }
        }
        if (isset($UITypes["datefields"]) && in_array($fieldname, $UITypes["datefields"])) {
            if ($emodule == "Events" || $emodule == "Calendar") {
                if ($fieldname == "date_start" && $efocus->column_fields["time_start"] != "") {
                    $curr_time = $efocus->column_fields['time_start'];
                    $value = $value . ' ' . $curr_time;
                } elseif ($fieldname == "due_date" && $efocus->column_fields["time_end"] != "") {
                    $curr_time = $efocus->column_fields['time_end'];
                    $value = $value . ' ' . $curr_time;
                }
            }
            if ($value != "") {
                $value = getValidDisplayDate($value);
            }
        } elseif (isset($UITypes["picklists"]) && in_array($fieldname, $UITypes["picklists"])) {
            if (!in_array(trim($value), $ignored_picklist_values)) {
                $value = $this->getTranslatedStringCustom($value, $emodule, $language);
            } else {
                $value = "";
            }
        } elseif (isset($UITypes["checkboxes"]) && in_array($fieldname, $UITypes["checkboxes"])) {
            if ($value == 1) {
                $value = vtranslate('LBL_YES');
            } else {
                $value = vtranslate('LBL_NO');
            }
        } elseif (isset($UITypes["textareas"]) && in_array($fieldname, $UITypes["textareas"])) {
            if (strpos($value, '&lt;br /&gt;') === false && strpos($value, '&lt;br/&gt;') === false && strpos($value, '&lt;br&gt;') === false) {
                $value = nl2br($value);
            }
            $value = html_entity_decode($value, ENT_QUOTES, $def_charset);
        } elseif (isset($UITypes["multipicklists"]) && in_array($fieldname, $UITypes["multipicklists"])) {
            $MultipicklistValues = explode(" |##| ", $value);
            foreach ($MultipicklistValues as &$value) {
                $value = $this->getTranslatedStringCustom($value, $emodule, $language);
            }
            $value = implode(', ', $MultipicklistValues);
        } elseif (isset($UITypes["currencyfields"]) && in_array($fieldname, $UITypes["currencyfields"])) {
            if (is_numeric($value)) {
                if ($inventory_currency === false) {
                    $user_currency_data = getCurrencySymbolandCRate($current_user->currency_id);
                    $crate = $user_currency_data["rate"];
                } else {
                    $crate = $inventory_currency["conversion_rate"];
                }
                $value = $value * $crate;
            }
            $value = $this->formatNumberToPDFwithAtr($value, $decimals, $decimal_point, $thousands_separator);
        } elseif (isset($UITypes["numberfields"]) && in_array($fieldname, $UITypes["numberfields"])) {
            $value = $this->formatNumberToPDFwithAtr($value, $decimals, $decimal_point, $thousands_separator);
        } elseif (isset($UITypes["userfields"]) && in_array($fieldname, $UITypes["userfields"])) {
            if ($value != "0" && $value != "") {
                $value = getOwnerName($value);
            } else {
                $value = "";
            }
        } elseif (isset($UITypes["userorotherfields"]) && in_array($fieldname, $UITypes["userorotherfields"])) {
            if ($value != "0" && $value != "") {
                $selid = $value;
                $value = getUserFullName($selid);

                if ($value == "") {
                    $value = $selid;
                    $parent_module = getSalesEntityType($selid);
                    $displayValueArray = getEntityName($parent_module, $selid);

                    if (!empty($displayValueArray)) {
                        foreach ($displayValueArray as $p_value) {
                            $value = $p_value;
                        }
                    }
                }
            } else {
                $value = "";
            }
        }
        return $value;
    }

    public function getTermsAndConditionsCustom($value)
    {
        $db = PearDatabase::getInstance();
        if (file_exists("modules/Settings/EditTermDetails.php")) {
            $res = $db->pquery("SELECT tandc FROM vtiger_inventory_tandc WHERE id = ?", array($value));
            $num = $db->num_rows($res);
            if ($num > 0) {
                $tandc = $db->query_result($res, 0, "tandc");
            } else {
                $tandc = $value;
            }
        } else {
            $tandc = $value;
        }
        return $tandc;
    }

    public function getFolderName($folderid)
    {
        $foldername = "";
        if ($folderid != "") {
            $db = PearDatabase::getInstance();
            $result = $db->pquery("SELECT foldername FROM vtiger_attachmentsfolder WHERE folderid = ?", array($folderid));
            if ($db->num_rows($result) > 0) {
                return $foldername = $db->query_result($result, 0, "foldername");
            }
        }
        return $foldername;
    }

    public function getTranslatedStringCustom($str, $emodule, $language)
    {

        if ($emodule != "Products/Services") {
            $app_lang = return_application_language($language);
            $mod_lang = return_specified_module_language($language, $emodule);
        } else {
            $app_lang = return_specified_module_language($language, "Services");
            $mod_lang = return_specified_module_language($language, "Products");
        }
        $trans_str = ($mod_lang[$str] != '') ? $mod_lang[$str] : (($app_lang[$str] != '') ? $app_lang[$str] : $str);
        return $trans_str;
    }

    public function formatNumberToPDFwithAtr($value, $decimals, $decimal_point, $thousands_separator)
    {
        $number = "";
        if (is_numeric($value)) {
            $number = number_format($value, $decimals, $decimal_point, $thousands_separator);
        }
        return $number;
    }

    public function isInventoryModule($module)
    {

        $class_name = $module . "_Module_Model";

        if (class_exists($class_name)) {
            if (is_subclass_of($class_name, 'Inventory_Module_Model')) {
                self::$is_inventory_module[$module] = true;
            } else {
                self::$is_inventory_module[$module] = false;
            }
        }

        return self::$is_inventory_module[$module];
    }

    public function getUITypeRelatedModule($uitype, $fk_record)
    {

        $related_module = "";
        switch ($uitype) {
            case "51":
            case "73":
                $related_module = "Accounts";
                break;
            case "57":
                $related_module = "Contacts";
                break;
            case "58":
                $related_module = "Campaigns";
                break;
            case "59":
                $related_module = "Products";
                break;
            case "81":
            case "75":
                $related_module = "Vendors";
                break;
            case "76":
                $related_module = "Potentials";
                break;
            case "78":
                $related_module = "Quotes";
                break;
            case "80":
                $related_module = "SalesOrder";
                break;
            case '53':
            case "101":
                $related_module = "Users";
                break;
            case "68":
            case "10":
                $related_module = getSalesEntityType($fk_record);
                break;
        }

        return $related_module;
    }

    public function getRelBlockLabels()
    {
        $LD = array(
            "Last Modified By" => "Last Modified",
            "Conversion Rate" => "LBL_CONVERSION_RATE",
            "List Price" => "LBL_LIST_PRICE",
            "Discount" => "LBL_DISCOUNT",
            "Quantity" => "LBL_QUANTITY",
            "Comments" => "LBL_COMMENTS",
            "Currency" => "LBL_CURRENCY",
            "Due Date" => "LBL_DUE_DATE",
            "End Time" => "End Time",
            "Related to" => "LBL_RELATED_TO",
            "Assigned To" => "Assigned To",
            "Created Time" => "Created Time",
            "Modified Time" => "Modified Time"
        );
        return $LD;
    }
}