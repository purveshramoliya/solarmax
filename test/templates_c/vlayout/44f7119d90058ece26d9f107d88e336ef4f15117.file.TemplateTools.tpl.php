<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:10:28
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/TemplateTools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1910892446612c9c1f5ce920-61276594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44f7119d90058ece26d9f107d88e336ef4f15117' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/TemplateTools.tpl',
      1 => 1631714818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1910892446612c9c1f5ce920-61276594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_612c9c1f5f550',
  'variables' => 
  array (
    'ALLOW_SET_AS' => 0,
    'IS_ACTIVE' => 0,
    'TEMPLATEID' => 0,
    'DEFAULT_BUTTON' => 0,
    'ACTIVATE_BUTTON' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612c9c1f5f550')) {function content_612c9c1f5f550($_smarty_tpl) {?>
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