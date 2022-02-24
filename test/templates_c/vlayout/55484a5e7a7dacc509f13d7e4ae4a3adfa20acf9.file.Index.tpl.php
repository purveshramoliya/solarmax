<?php /* Smarty version Smarty-3.1.7, created on 2021-10-07 08:31:13
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouCreator/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:754846274615eb051c3a1e8-16399516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55484a5e7a7dacc509f13d7e4ae4a3adfa20acf9' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouCreator/Index.tpl',
      1 => 1632854909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '754846274615eb051c3a1e8-16399516',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'QUALIFIED_MODULE' => 0,
    'ALL_MODULES' => 0,
    'MODULE' => 0,
    'MODULE_ID' => 0,
    'CREATOR_FIELDS' => 0,
    'COUNTER' => 0,
    'MODULE_ACTIVE' => 0,
    'MODULE_LABEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_615eb051c8439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_615eb051c8439')) {function content_615eb051c8439($_smarty_tpl) {?>
<div id="Settings_<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_Index_View"><div class="listViewContentDiv col-lg-12"><br><h3><?php echo vtranslate('LBL_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><div><?php echo vtranslate('LBL_SETTINGS_DESC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><hr><form name="linkModulesForm" id="linkModulesForm" method="POST"><table class="table table-bordered equalSplit"><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><tr><?php  $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ALL_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE']->key => $_smarty_tpl->tpl_vars['MODULE']->value){
$_smarty_tpl->tpl_vars['MODULE']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['MODULE_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE']->value->id, null, 0);?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE']->value->name, null, 0);?><?php $_smarty_tpl->tpl_vars['MODULE_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['MODULE']->value->label,$_smarty_tpl->tpl_vars['MODULE_NAME']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['MODULE_ACTIVE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CREATOR_FIELDS']->value[$_smarty_tpl->tpl_vars['MODULE_ID']->value]['active'], null, 0);?><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==2){?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?></tr><tr><?php }?><td><div class="row-fluid moduleManagerBlock"><span class="span1" style="line-height: 2.5;"><input type="checkbox" class='its4you_creator_checkbox' name="status" data-tabid="<?php echo $_smarty_tpl->tpl_vars['MODULE_ID']->value;?>
" data-module="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_ACTIVE']->value){?>checked<?php }?> /></span><span class="span5 moduleName"><h4 style="line-height: 2;"><?php echo $_smarty_tpl->tpl_vars['MODULE_LABEL']->value;?>
</h4></span></div></td><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?><?php } ?></tr></table></form></div></div><?php }} ?>