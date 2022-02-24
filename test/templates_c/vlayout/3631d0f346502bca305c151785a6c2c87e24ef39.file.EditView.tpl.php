<?php /* Smarty version Smarty-3.1.7, created on 2021-09-14 17:26:13
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Inventory/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135137207661177cd3bf9e87-76419402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3631d0f346502bca305c151785a6c2c87e24ef39' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Inventory/EditView.tpl',
      1 => 1631638708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135137207661177cd3bf9e87-76419402',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61177cd3c35c6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61177cd3c35c6')) {function content_61177cd3c35c6($_smarty_tpl) {?>

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
 

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewBlocks.tpl",'Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("LineItemsEdit.tpl",'Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewActions.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>