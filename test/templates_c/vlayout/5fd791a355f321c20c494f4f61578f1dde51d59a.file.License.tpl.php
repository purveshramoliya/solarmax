<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 07:52:37
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/License.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3373591595bb1c97e191379-74913836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd791a355f321c20c494f4f61578f1dde51d59a' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/License.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3373591595bb1c97e191379-74913836',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1c97e1fa07',
  'variables' => 
  array (
    'MODULE' => 0,
    'LICENSE' => 0,
    'MODE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1c97e1fa07')) {function content_5bb1c97e1fa07($_smarty_tpl) {?>
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