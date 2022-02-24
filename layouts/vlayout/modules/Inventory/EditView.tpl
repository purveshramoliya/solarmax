{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}
{literal}
 <script>
 $(document).ready(function(){   
 if($("select[name=cf_753]").val() != "" ){
    var module = document.getElementsByName('module')[0].value;
    if(module == 'Quotes')
    {
       //  if($("select[name=cf_753]").val() != "" ){
//     var module = document.getElementsByName('module')[0].value;
//     if(module == 'Quotes')
//     {
//          $(".listPrice").prop("readonly", true);
//          // $(".qty").prop("readonly", true);
//          $(".lineItemCommentBox").prop("readonly", true);
//          $("#shipping_handling_charge").prop("readonly", true);
//          $(".lineItemPopup").prop("disabled", true);
//         // $(".row-fluid").prop("readonly", true);
//         // $(".input-large").prop("readonly", true);
//          $(".relatedPopup").prop("disabled", true);
//          $(".icon-search").prop("disabled", true);
//          $(".icon-trash").prop("disabled", true);
         
         
//          $("#icon-trash").hide();
//          $(".createReferenceRecord").prop("disabled", true);
//         // $(".add-on").prop("disabled", true);
//         // $(".cursorPointer").prop("disabled", true);
//         // $(".icon-plus").prop("disabled", true);
//         // $(".dateField").attr("readonly", true);
//         // $(".icon-calendar").prop("disabled", true);
//         // $(".chzn-select").prop("disabled", true);
//          $("#addProduct").hide();
//     }
// }
    }
}
});
 $(document).ready(function(){
    $('#PayuMoney_editView_fieldName_cf_896').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_753').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_755').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_757').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_759').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_761').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_763').attr('disabled', 'disabled');
    $('#Invoice_editView_fieldName_cf_765').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_767').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_769').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_771').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_773').attr('readonly', true);
    $('#Invoice_editView_fieldName_cf_775').attr('readonly', true);
    $('#received').attr('readonly', true);
    
    
    $('#SalesOrder_editView_fieldName_cf_753').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_755').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_757').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_759').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_761').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_763').attr('disabled', 'disabled');
    $('#SalesOrder_editView_fieldName_cf_765').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_767').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_769').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_771').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_773').attr('readonly', true);
    $('#SalesOrder_editView_fieldName_cf_775').attr('readonly', true);
   $('[name="bill_street"]').attr('readonly', true);
    $('[name="bill_state"]').attr('readonly', true);
    $('[name="bill_city"]').attr('readonly', true);
    $('[name="bill_code"]').attr('readonly', true);
    
 });
 </script>
 {/literal}

{include file="EditViewBlocks.tpl"|@vtemplate_path:'Inventory'}
{include file="LineItemsEdit.tpl"|@vtemplate_path:'Inventory'}
{include file="EditViewActions.tpl"|@vtemplate_path:'Vtiger'}