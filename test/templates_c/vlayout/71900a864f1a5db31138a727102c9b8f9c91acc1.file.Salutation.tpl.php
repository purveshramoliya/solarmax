<?php /* Smarty version Smarty-3.1.7, created on 2019-04-12 11:12:04
         compiled from "/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/Salutation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19745116745cb07284277733-38068881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71900a864f1a5db31138a727102c9b8f9c91acc1' => 
    array (
      0 => '/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/Salutation.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19745116745cb07284277733-38068881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SALUTATION_FIELD_MODEL' => 0,
    'MODULE' => 0,
    'PICKLIST_VALUES' => 0,
    'PICKLIST_NAME' => 0,
    'PICKLIST_VALUE' => 0,
    'FIELD_MODEL' => 0,
    'FIELD_NAME' => 0,
    'FIELD_INFO' => 0,
    'SPECIAL_VALIDATOR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5cb0728435b9f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb0728435b9f')) {function content_5cb0728435b9f($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value){?><?php $_smarty_tpl->tpl_vars['PICKLIST_VALUES'] = new Smarty_variable($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->getPicklistValues(), null, 0);?><?php $_smarty_tpl->tpl_vars["SALUTATION_VALIDATOR"] = new Smarty_variable($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->getValidator(), null, 0);?><select class="chzn-select" style="width: 70px" name="<?php echo $_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->get('name');?>
" data-validation-engine="validate[<?php if ($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->isMandatory()==true){?> required,<?php }?>funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" ><?php if ($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->isEmptyPicklistOptionAllowed()){?><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php }?><?php  $_smarty_tpl->tpl_vars['PICKLIST_VALUE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = false;
 $_smarty_tpl->tpl_vars['PICKLIST_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key => $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value){
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = true;
 $_smarty_tpl->tpl_vars['PICKLIST_NAME']->value = $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key;
?><option value="<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKLIST_NAME']->value);?>
" <?php if (trim(decode_html($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value->get('fieldvalue')))==trim($_smarty_tpl->tpl_vars['PICKLIST_NAME']->value)){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value;?>
</option><?php } ?></select>&nbsp;<?php }?><?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo())), null, 0);?><?php $_smarty_tpl->tpl_vars["SPECIAL_VALIDATOR"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator(), null, 0);?><?php $_smarty_tpl->tpl_vars["FIELD_NAME"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name'), null, 0);?><input <?php if ($_smarty_tpl->tpl_vars['SALUTATION_FIELD_MODEL']->value){?> style="width:130px" <?php }?> id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_editView_fieldName_<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" type="text" class="input-large <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()){?>nameField<?php }?>" data-validation-engine="validate[<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()==true){?>required,<?php }?>funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
"<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='3'||$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='4'){?> readonly <?php }?> data-fieldinfo='<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value;?>
' <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?>data-validator=<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
<?php }?> /><?php }} ?>