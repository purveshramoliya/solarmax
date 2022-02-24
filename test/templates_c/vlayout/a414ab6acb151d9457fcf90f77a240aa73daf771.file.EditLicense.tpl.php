<?php /* Smarty version Smarty-3.1.7, created on 2021-09-12 05:01:31
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditLicense.tpl" */ ?>
<?php /*%%SmartyHeaderCode:971517319613d89aba329a0-48891516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a414ab6acb151d9457fcf90f77a240aa73daf771' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditLicense.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '971517319613d89aba329a0-48891516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TYPE' => 0,
    'LICENSEKEY' => 0,
    'LABELID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_613d89aba7f4b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_613d89aba7f4b')) {function content_613d89aba7f4b($_smarty_tpl) {?>
<div class="CustomLabelModalContainer"><div class="modal-header"><button class="close vtButton" data-dismiss="modal">×</button><?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="reactivate"){?><h3><?php echo vtranslate('LBL_REACTIVATE','PDFMaker');?>
</h3><?php }else{ ?><h3><?php echo vtranslate('LBL_ACTIVATE_KEY','PDFMaker');?>
</h3><?php }?></div><form id="editLicense" class="form-horizontal contentsBackground"><input type="hidden" name="module" value="PDFMaker"><input type="hidden" name="action" value="License"><input type="hidden" name="mode" value="editLicense"><input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['TYPE']->value;?>
"><div class="modal-body"><div class="row-fluid"><div class="control-group"><label class="muted control-label"><?php echo vtranslate('LBL_LICENSE_KEY','PDFMaker');?>
</label><div class="controls"><input type="text" name="licensekey" value="<?php echo $_smarty_tpl->tpl_vars['LICENSEKEY']->value;?>
" data-validation-engine='validate[required]' /></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['LABELID']->value==''){?><input type="hidden" class="addCustomLabelView" value="true" /><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>