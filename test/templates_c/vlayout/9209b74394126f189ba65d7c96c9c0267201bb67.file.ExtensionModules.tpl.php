<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ExtensionModules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3858743896141fd98218507-68799009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9209b74394126f189ba65d7c96c9c0267201bb67' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/ExtensionModules.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3858743896141fd98218507-68799009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fd9823563',
  'variables' => 
  array (
    'REGISTRATION_STATUS' => 0,
    'PASSWORD_STATUS' => 0,
    'IS_HOSTING_LICENSE' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fd9823563')) {function content_6141fd9823563($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['IS_AUTH'] = new Smarty_variable(($_smarty_tpl->tpl_vars['REGISTRATION_STATUS']->value&&$_smarty_tpl->tpl_vars['PASSWORD_STATUS']->value), null, 0);?><div class="content" style="height:100%"><?php if (!$_smarty_tpl->tpl_vars['IS_HOSTING_LICENSE']->value){?><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="tab-item taxesTab active"><a data-toggle="tab" href="#installedModules"><strong><?php echo vtranslate('LBL_INSTALLED_AND_AVAILABLE_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li class="tab-item chargesTab"><a data-toggle="tab" href="#modulesShop"><strong><?php echo vtranslate('LBL_MODULES_SHOP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul><?php }?><div class="tab-content layoutContent overflowVisible" style="height:100%"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("InstalledModules.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php if (!$_smarty_tpl->tpl_vars['IS_HOSTING_LICENSE']->value){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModulesShop.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></div></div><div class="textAlignCenter" style="color: #888;"><?php echo vtranslate('ITS4YouInstaller',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo ITS4YouInstaller_Version_Helper::$version;?>
 <?php echo vtranslate('COPYRIGHT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><br><?php }} ?>