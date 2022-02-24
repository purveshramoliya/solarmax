<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 06:49:53
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/AddNotePad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7410006895bb1c39144f480-83814961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2022e04afc08597b2c1d2acf11a0a726c0de0a3' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/AddNotePad.tpl',
      1 => 1468488064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7410006895bb1c39144f480-83814961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1c3914d8ca',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1c3914d8ca')) {function content_5bb1c3914d8ca($_smarty_tpl) {?>
<div id="addNotePadWidgetContainer" class='modal'><div class="modal-header contentsBackground"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><h3 id="massEditHeader"><?php echo vtranslate('LBL_ADD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_NOTEPAD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><form class="form-horizontal" method="POST"><div class="control-group margin0px padding1per"><label class="control-label"><?php echo vtranslate('LBL_NOTEPAD_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span> </label><div class="controls"><input type="text" name="notePadName" class="input-large" data-validation-engine="validate[required]" /></div></div><div class="control-group margin0px padding1per"><label class="control-label"><?php echo vtranslate('LBL_NOTEPAD_CONTENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls"><textarea type="text" name="notePadContent" style="min-height: 100px;resize: none;"/></div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>