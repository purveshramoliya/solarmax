<?php /* Smarty version Smarty-3.1.7, created on 2021-09-15 14:09:44
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/rows/License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17089877506141fdf65dd225-66616601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48f5e83e12633522aed24cbf70de9231504f8fa1' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/Settings/ITS4YouInstaller/rows/License.tpl',
      1 => 1631714980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17089877506141fdf65dd225-66616601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_6141fdf662895',
  'variables' => 
  array (
    'LICENSE' => 0,
    'LICENSE_KEY' => 0,
    'QUALIFIED_MODULE' => 0,
    'EXTENSION_MODEL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6141fdf662895')) {function content_6141fdf662895($_smarty_tpl) {?>
<tr>
    <td style="border-left:none;border-right:none;">
        <a class="licenseColors" href="#<?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('service_usageunit')!='Package'){?><?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('cf_identifier');?>
<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>

        </a>
    </td>
    <td style="border-left:none;border-right:none;">
        <?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->get('servicename');?>

    </td>
    <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isHostingLicense()){?>
        <td colspan="3" style="border-left:none;">
            <?php echo vtranslate('LBL_HOSTING_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

        </td>
    <?php }else{ ?>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date')!=''){?><?php echo Vtiger_Util_Helper::formatDateIntoStrings($_smarty_tpl->tpl_vars['LICENSE']->value->get('due_date'));?>
<?php }?>
        </td>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?>
                <?php echo vtranslate('LBL_SUBSCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')=="1"){?>
                <?php echo vtranslate('LBL_DEMO_FREE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }else{ ?>
                <?php echo vtranslate('LBL_FULL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

            <?php }?>
        </td>
        <td style="border-left:none;border-right:none;">
            <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->isRenewReady()&&$_smarty_tpl->tpl_vars['EXTENSION_MODEL']->value->isAllowedBuyLicense()){?>
                <?php if ($_smarty_tpl->tpl_vars['LICENSE']->value->get('subscription')=="1"){?>
                    <a class="btn btn-info" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getRenewUrl();?>
"><?php echo vtranslate('LBL_PROLONG_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }elseif($_smarty_tpl->tpl_vars['LICENSE']->value->get('demo_free')==true){?>
                    <a class="btn btn-success" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getConvertUrl();?>
"><?php echo vtranslate('LBL_BUY_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="btn btn-primary" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value->getRenewUrl();?>
"><?php echo vtranslate('LBL_RENEW_LICENSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
                <?php }?>
                &nbsp;&nbsp;
            <?php }?>
            <button class="btn btn-danger actionLicenses" type="button" data-mode="deactivate" data-license="<?php echo $_smarty_tpl->tpl_vars['LICENSE_KEY']->value;?>
"><?php echo vtranslate('LBL_DEACTIVATE_LICENSES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
        </td>
    <?php }?>
</tr><?php }} ?>