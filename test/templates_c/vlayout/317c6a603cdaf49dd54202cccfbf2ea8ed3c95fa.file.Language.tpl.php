<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/rows/Language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19298505816141fd98391090-94923488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '317c6a603cdaf49dd54202cccfbf2ea8ed3c95fa' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/rows/Language.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19298505816141fd98391090-94923488',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fd983b26a',
  'variables' => 
  array (
    'LANGUAGE' => 0,
    'QUALIFIED_MODULE' => 0,
    'LANG_KEY' => 0,
    'ALL_LANGUAGES' => 0,
    'IS_AUTH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fd983b26a')) {function content_6141fd983b26a($_smarty_tpl) {?>
<tr class="" data-cfmid="1">
    <td style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
    <td colspan="2" style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
    <td style="border-left:none;border-right:none;">
        <span class="extension_container">
            <input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name');?>
"/>
            <input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('downloadURL');?>
"/>

            <input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('id');?>
"/>
            <span class="pull-left">
                <?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website')!=''){?>
                    <button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                <?php }?>
                <?php $_smarty_tpl->tpl_vars['LANG_KEY'] = new Smarty_variable($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name'), null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['ALL_LANGUAGES']->value[$_smarty_tpl->tpl_vars['LANG_KEY']->value]==''){?>
                    <input type="hidden" name="moduleAction" value="Install"/>
                    <button class="oneclickInstallFree btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                <?php }?>
            </span>
        </span>
    </td>
</tr><?php }} ?>