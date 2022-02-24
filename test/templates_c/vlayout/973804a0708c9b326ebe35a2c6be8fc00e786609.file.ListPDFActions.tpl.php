<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 07:52:29
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7926759495bb1c9796ba817-92501187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '973804a0708c9b326ebe35a2c6be8fc00e786609' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFActions.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7926759495bb1c9796ba817-92501187',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1c979721da',
  'variables' => 
  array (
    'LISTVIEW_LINKS' => 0,
    'MODULE' => 0,
    'LISTVIEW_SETTING' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1c979721da')) {function content_5bb1c979721da($_smarty_tpl) {?>
<span class="listViewActions"><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING'])>0){?><span class="btn-toolbar"><span class="btn-group pull-right"><button class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="alignMiddle" src="<?php echo vimage_path('tools.png');?>
" alt="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
">&nbsp;&nbsp;<i class="caret"></i></button><ul class="listViewSetting dropdown-menu"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_SETTING'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWSETTING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->key => $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->_loop = true;
?><li><a href=<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getUrl();?>
><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_SETTING']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php } ?></ul></span></span><?php }?></span><div class="clearfix"></div><input type="hidden" id="recordsCount" value=""/><input type="hidden" id="selectedIds" name="selectedIds" /><input type="hidden" id="excludedIds" name="excludedIds" /><?php }} ?>