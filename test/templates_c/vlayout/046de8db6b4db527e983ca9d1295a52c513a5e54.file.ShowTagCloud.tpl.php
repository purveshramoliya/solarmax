<?php /* Smarty version Smarty-3.1.7, created on 2018-10-16 21:16:15
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Vtiger/ShowTagCloud.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3571562125bc6551f4e6ac7-54165127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '046de8db6b4db527e983ca9d1295a52c513a5e54' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Vtiger/ShowTagCloud.tpl',
      1 => 1468488064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3571562125bc6551f4e6ac7-54165127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MAX_TAG_LENGTH' => 0,
    'MODULE' => 0,
    'TAGS' => 0,
    'TAG_NAME' => 0,
    'TAG_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bc6551f58454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc6551f58454')) {function content_5bc6551f58454($_smarty_tpl) {?>
<div class="row-fluid tagCloudContainer"><input type="hidden" id="maxTagLength" value="<?php echo $_smarty_tpl->tpl_vars['MAX_TAG_LENGTH']->value;?>
" /><div class="row-fluid"><span class="span1">&nbsp;</span><input type="text" class="span10" id="tagRecordText" /></div><div class="row-fluid"><div class="row-fluid"><span class="span1">&nbsp;</span><input type="button" class="btn span" id="tagRecord" value="<?php echo vtranslate('LBL_TAG_THIS_RECORD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" /></div></div><div class="span11 row-fluid padding10" id="tagsList"><?php  $_smarty_tpl->tpl_vars['TAG_ID'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TAG_ID']->_loop = false;
 $_smarty_tpl->tpl_vars['TAG_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['TAGS']->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TAG_ID']->key => $_smarty_tpl->tpl_vars['TAG_ID']->value){
$_smarty_tpl->tpl_vars['TAG_ID']->_loop = true;
 $_smarty_tpl->tpl_vars['TAG_NAME']->value = $_smarty_tpl->tpl_vars['TAG_ID']->key;
?><div class="tag row-fluid span11 marginLeftZero" data-tagname="<?php echo $_smarty_tpl->tpl_vars['TAG_NAME']->value;?>
" data-tagid="<?php echo $_smarty_tpl->tpl_vars['TAG_ID']->value;?>
"><span class="tagName textOverflowEllipsis span11"><a class="cursorPointer"><?php echo $_smarty_tpl->tpl_vars['TAG_NAME']->value;?>
</a></span><span class="pull-right deleteTag cursorPointer">x</span></div><?php } ?></div></div>	<?php }} ?>