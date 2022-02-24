<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/InstalledModules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11359092596141fd982385b0-21338699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3d7c67c33deaba9fccc391a49511afe33de9b01' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/InstalledModules.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11359092596141fd982385b0-21338699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fd982b1c5',
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
    'ERROR_MESSAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'IS_AUTH' => 0,
    'LICENSES_LIST' => 0,
    'LICENSE' => 0,
    'EMPTY_LICENSES' => 0,
    'EMPTY_LICENSE' => 0,
    'MODULE' => 0,
    'EXTENSIONS_LIST' => 0,
    'EXTENSION' => 0,
    'LANGUAGES_LIST' => 0,
    'LANGUAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fd982b1c5')) {function content_6141fd982b1c5($_smarty_tpl) {?>
<div class="tab-pane active" id="installedModules"><?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value){?><div class="col-md-12"><?php  $_smarty_tpl->tpl_vars['ERROR_MESSAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->key => $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value){
$_smarty_tpl->tpl_vars['ERROR_MESSAGE']->_loop = true;
?><div><div class="displayInlineBlock alert alert-danger"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></div><?php } ?></div><?php }elseif(!$_smarty_tpl->tpl_vars['IS_AUTH']->value){?><div style="text-align: center;"><br><div class="alert alert-danger displayInlineBlock logintoInstaller extensionLoginAlert"><?php echo vtranslate('LBL_LOGIN_TO_INSTALLER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><br></div><?php }else{ ?><div class="col-md-12"><br><h4><?php echo vtranslate('LBL_ACTIVATED_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4><hr><div><button class="btn btn-primary activateButton" type="button"><i class="fa fa-plus icon-plus"></i>&nbsp;&nbsp;<div class="displayInlineBlock"><?php echo vtranslate('LBL_ACTIVATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo vtranslate('LBL_LICENSE_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></button>&nbsp;&nbsp;<button class="btn btn-secondary updateButton" type="button"><i class="fa fa-refresh icon-refresh"></i>&nbsp;&nbsp;<div class="displayInlineBlock"><?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></button></div><br><table class="table table-bordered"><thead><tr><th><?php echo vtranslate('LBL_LICENSE_KEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_DUE_DATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_LICENSE_TYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['LICENSE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LICENSE']->_loop = false;
 $_smarty_tpl->tpl_vars['LICENSE_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LICENSES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LICENSE']->key => $_smarty_tpl->tpl_vars['LICENSE']->value){
$_smarty_tpl->tpl_vars['LICENSE']->_loop = true;
 $_smarty_tpl->tpl_vars['LICENSE_KEY']->value = $_smarty_tpl->tpl_vars['LICENSE']->key;
?><?php if (!$_smarty_tpl->tpl_vars['LICENSE']->value){?><?php continue 1?><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("rows/License.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php } ?><?php if (!empty($_smarty_tpl->tpl_vars['EMPTY_LICENSES']->value)){?><tr><td style="border-left:none;border-right:none;" colspan="4"><?php  $_smarty_tpl->tpl_vars['EMPTY_LICENSE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EMPTY_LICENSES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->key => $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->value){
$_smarty_tpl->tpl_vars['EMPTY_LICENSE']->_loop = true;
?><div><?php echo $_smarty_tpl->tpl_vars['EMPTY_LICENSE']->value;?>
</div><br><?php } ?></td><td style="border-left:none;border-right:none;" title="<?php echo vtranslate('LBL_EMPTY_LICENSES_MESSAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><form action="index.php" method="post"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="action" value="Basic"><input type="hidden" name="mode" value="clearEmptyLicenses"><button class="btn btn-warning"><?php echo vtranslate('LBL_EMPTY_LICENSES_BUTTON',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</></form></td></tr><?php }?></tbody></table></div><?php }?><div class="col-md-12"><div><br><div class="marginBottom5px"><h4><?php echo vtranslate('LBL_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><table class="table table-bordered"><thead><tr><th style="width: 30%;"><?php echo vtranslate('Name',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th style="width: 15%;"><?php echo vtranslate('LBL_VERSION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th style="width: 15%;"><?php echo vtranslate('LBL_NEWEST_VERSION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['EXTENSION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['EXTENSION']->_loop = false;
 $_smarty_tpl->tpl_vars['EXTENSION_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['EXTENSIONS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['EXTENSION']->key => $_smarty_tpl->tpl_vars['EXTENSION']->value){
$_smarty_tpl->tpl_vars['EXTENSION']->_loop = true;
 $_smarty_tpl->tpl_vars['EXTENSION_ID']->value = $_smarty_tpl->tpl_vars['EXTENSION']->key;
?><?php if (!$_smarty_tpl->tpl_vars['EXTENSION']->value->isVisible()){?><?php continue 1?><?php }?><?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isMultiPackage()){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("rows/Package.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }else{ ?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("rows/Extension.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php } ?></tbody></table></div><div><br><div class="marginBottom5px"><h4><?php echo vtranslate('LBL_AVAILABLE_LANGUAGES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><table class="table table-bordered"><thead><tr><th style="width: 30%;"><?php echo vtranslate('LBL_LANGUAGE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th style="width: 30%;"><?php echo vtranslate('LBL_DESCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['LANGUAGE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LANGUAGE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LANGUAGES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LANGUAGE']->key => $_smarty_tpl->tpl_vars['LANGUAGE']->value){
$_smarty_tpl->tpl_vars['LANGUAGE']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isVtigerCompatible()&&!$_smarty_tpl->tpl_vars['LANGUAGE']->value->isAlreadyExists()&&($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')=='Free'||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price')==0||$_smarty_tpl->tpl_vars['LANGUAGE']->value->get('available')==1)){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("rows/Language.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?><?php } ?></tbody></table></div></div></div><br><?php }} ?>