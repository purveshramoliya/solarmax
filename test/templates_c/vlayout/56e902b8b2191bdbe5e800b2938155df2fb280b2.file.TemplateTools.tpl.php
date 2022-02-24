<?php /* Smarty version Smarty-3.1.7, created on 2019-09-08 03:09:41
         compiled from "/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/PDFMaker/TemplateTools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6256851025d7470f5b1b174-27675870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56e902b8b2191bdbe5e800b2938155df2fb280b2' => 
    array (
      0 => '/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/PDFMaker/TemplateTools.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6256851025d7470f5b1b174-27675870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ALLOW_SET_AS' => 0,
    'IS_ACTIVE' => 0,
    'TEMPLATEID' => 0,
    'DEFAULT_BUTTON' => 0,
    'ACTIVATE_BUTTON' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d7470f5bb330',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d7470f5bb330')) {function content_5d7470f5bb330($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['ALLOW_SET_AS']->value=='yes'){?>
    <div class="recordNamesList">
        <div class="row-fluid">
            <div class="span10">
                <ul class="nav nav-list">
                    <?php if ($_smarty_tpl->tpl_vars['ALLOW_SET_AS']->value=='yes'){?>
                    <?php if ($_smarty_tpl->tpl_vars['IS_ACTIVE']->value!=vtranslate('Inactive','PDFMaker')){?>
                    <li><a href="javascript:void(0);" onClick="PDFMaker_Detail_Js.changeActiveOrDefault('<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
','default');"><?php echo $_smarty_tpl->tpl_vars['DEFAULT_BUTTON']->value;?>
</a></li>
                    <?php }?>
                    <li><a href="javascript:void(0);" onClick="PDFMaker_Detail_Js.changeActiveOrDefault('<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
','active');"><?php echo $_smarty_tpl->tpl_vars['ACTIVATE_BUTTON']->value;?>
</a></li>
                    <?php }?>
            </div>
        </div>
    </div>
<?php }?><?php }} ?>