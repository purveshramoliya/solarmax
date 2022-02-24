<?php /* Smarty version Smarty-3.1.7, created on 2021-08-30 08:51:48
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:886492708612c9c248c8316-13295216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaebc0085426b38383f91d1d3120c1bf06ff470c' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/License.tpl',
      1 => 1628927583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '886492708612c9c248c8316-13295216',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'LICENSE' => 0,
    'MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_612c9c248f56d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612c9c248f56d')) {function content_612c9c248f56d($_smarty_tpl) {?>
<script type="text/javascript" src="layouts/vlayout/modules/PDFMaker/resources/License.js"></script>
<div class="container-fluid" id="licenseContainer">
    
    <form name="profiles_privilegies" action="index.php" method="post" class="form-horizontal">
    <br>
    <label class="pull-left themeTextColor font-x-x-large"><?php echo vtranslate('LBL_LICENSE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
    <br clear="all">
    <hr>

    <input type="hidden" name="module" value="PDFMaker" />
    <input type="hidden" name="view" value="" />
    <input type="hidden" name="license_key_val" id="license_key_val" value="<?php echo $_smarty_tpl->tpl_vars['LICENSE']->value;?>
" />
     <br />
    <div class="row-fluid">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('LicenseDetails.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['MODE']->value=="edit"){?>        
        <div class="pull-right">
            <button class="btn btn-success" type="submit"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
            <a class="cancelLink" onclick="javascript:window.history.back();" type="reset"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
        </div> 
    <?php }?>
    </form>        

</div>
      

<script language="javascript" type="text/javascript">
PDFMaker_License_Js.registerEvents();
</script>
    <?php }} ?>