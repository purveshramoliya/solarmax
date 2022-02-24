<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 07:52:41
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditLicense.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7361084765bb1c98207d2d3-59464013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba917ab0a8d066a4b94b0bd7d74d9f3b6f3b4e15' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditLicense.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7361084765bb1c98207d2d3-59464013',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1c9820e53a',
  'variables' => 
  array (
    'TYPE' => 0,
    'LICENSEKEY' => 0,
    'LABELID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1c9820e53a')) {function content_5bb1c9820e53a($_smarty_tpl) {?>
<div class="CustomLabelModalContainer"><div class="modal-header"><button class="close vtButton" data-dismiss="modal">×</button><?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="reactivate"){?><h3><?php echo vtranslate('LBL_REACTIVATE','PDFMaker');?>
</h3><?php }else{ ?><h3><?php echo vtranslate('LBL_ACTIVATE_KEY','PDFMaker');?>
</h3><?php }?></div><form id="editLicense" class="form-horizontal contentsBackground"><input type="hidden" name="module" value="PDFMaker"><input type="hidden" name="action" value="License"><input type="hidden" name="mode" value="editLicense"><input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['TYPE']->value;?>
"><div class="modal-body"><div class="row-fluid"><div class="control-group"><label class="muted control-label"><?php echo vtranslate('LBL_LICENSE_KEY','PDFMaker');?>
</label><div class="controls"><input type="text" name="licensekey" value="<?php echo $_smarty_tpl->tpl_vars['LICENSEKEY']->value;?>
" data-validation-engine='validate[required]' /></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['LABELID']->value==''){?><input type="hidden" class="addCustomLabelView" value="true" /><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>