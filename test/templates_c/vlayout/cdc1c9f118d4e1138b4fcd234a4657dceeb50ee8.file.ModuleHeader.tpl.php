<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ModuleHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18901852876141fd981fcb03-44544547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdc1c9f118d4e1138b4fcd234a4657dceeb50ee8' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ModuleHeader.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18901852876141fd981fcb03-44544547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fd9821565',
  'variables' => 
  array (
    'REQUIREMENTS' => 0,
    'MODULE_MODEL' => 0,
    'MODULE' => 0,
    'PASSWORD_STATUS' => 0,
    'QUALIFIED_MODULE' => 0,
    'USER_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fd9821565')) {function content_6141fd9821565($_smarty_tpl) {?>
<div><div class="clearfix padding10 marginBottom10px"><div class="pull-right"><button class="btn btn-<?php echo $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getButtonType();?>
" type="button" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getRequirementsUrl();?>
', '_blank');"><?php echo vtranslate('LBL_SYSTEM_REQUIREMENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;<?php if (!($_smarty_tpl->tpl_vars['PASSWORD_STATUS']->value)){?><button class="btn btn-default module-buttons" type="button" id="logintoInstaller"><div class="fa fa-sign-in" aria-hidden="true"></div>&nbsp;<?php echo vtranslate('LBL_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }else{ ?><button class="btn btn-default module-buttons" type="button" style="text-transform:none"><?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
</button>&nbsp;<button class="btn btn-danger" type="button" id="logoutInstaller"><span class="fa fa-power-off"></span>&nbsp;<?php echo vtranslate('LBL_LOGOUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></div><br></div></div><?php }} ?>