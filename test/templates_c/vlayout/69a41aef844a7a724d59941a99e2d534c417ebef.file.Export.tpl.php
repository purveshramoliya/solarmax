<?php /* Smarty version Smarty-3.1.7, created on 2019-03-17 01:32:35
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13995317765c8da3b381db14-82082277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69a41aef844a7a724d59941a99e2d534c417ebef' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Export.tpl',
      1 => 1514975518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13995317765c8da3b381db14-82082277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5c8da3b382a99',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c8da3b382a99')) {function content_5c8da3b382a99($_smarty_tpl) {?><button onclick="md_makePackage(false)"><?php echo vtranslate('LBL_MAKE_PACKAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><br /><br />
<button onclick="md_makePackage(true)"><?php echo vtranslate('LBL_CREATE_AND_INSTALL_PACKAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }} ?>