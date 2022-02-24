<?php /* Smarty version Smarty-3.1.7, created on 2021-09-29 05:23:02
         compiled from "/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Extensions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2137483913612c9c6a2c5f57-09238396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f01108d308b01dfa485765aa96443f34d6db0d97' => 
    array (
      0 => '/home/customer/www/solarmaxx.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Extensions.tpl',
      1 => 1631714818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2137483913612c9c6a2c5f57-09238396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_612c9c6a3569e',
  'variables' => 
  array (
    'EXTENSIONS_ARR' => 0,
    'arr' => 0,
    'extname' => 0,
    'MODE' => 0,
    'MODULE' => 0,
    'ERROR' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_612c9c6a3569e')) {function content_612c9c6a3569e($_smarty_tpl) {?>
<div class="container-fluid" id="licenseContainer">
    
    <form name="profiles_privilegies" action="index.php" method="post" class="form-horizontal">
    <br>
    <label class="pull-left themeTextColor font-x-x-large"><?php echo vtranslate('LBL_EXTENSIONS','PDFMaker');?>
</label>
    <br clear="all">
    <hr>
    <input type="hidden" name="module" value="PDFMaker" />
    <input type="hidden" name="view" value="" />
     <br />
    <div class="row-fluid">
        <label class="fieldLabel"><strong><?php echo vtranslate('LBL_AVAILABLE_EXTENSIONS','PDFMaker');?>
:</strong></label>
        
        <?php  $_smarty_tpl->tpl_vars['arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arr']->_loop = false;
 $_smarty_tpl->tpl_vars['extname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['EXTENSIONS_ARR']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->key => $_smarty_tpl->tpl_vars['arr']->value){
$_smarty_tpl->tpl_vars['arr']->_loop = true;
 $_smarty_tpl->tpl_vars['extname']->value = $_smarty_tpl->tpl_vars['arr']->key;
?>
            <br>    
            <table class="table table-bordered equalSplit detailview-table">
                <thead>
                    <tr>
                        <th class="blockHeader" colspan="2"><b><div class="pull-left" style="font-size:18px;padding-top:5px"><?php echo vtranslate($_smarty_tpl->tpl_vars['arr']->value['label'],'PDFMaker');?>
</div></b>
                            <?php if ($_smarty_tpl->tpl_vars['arr']->value['download']!=''){?><span class="pull-right"><a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['arr']->value['download'];?>
"><?php echo vtranslate('LBL_DOWNLOAD','PDFMaker');?>
</a></span><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['arr']->value['install']!=''){?>
                                <span class="pull-right"><button type="button" id="install_<?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
_btn" class="btn btn-success" data-extname="<?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['arr']->value['install'];?>
"><?php echo vtranslate('LBL_INSTALL_BUTTON','Install');?>
</button></span>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['arr']->value['button']!=''){?>
                                <span class="pull-right"><button type="button" id="<?php echo $_smarty_tpl->tpl_vars['arr']->value['button']['type'];?>
_<?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
_btn" class="btn <?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
_btn <?php echo $_smarty_tpl->tpl_vars['arr']->value['button']['style'];?>
" data-extname="<?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['arr']->value['button']['url'];?>
"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['arr']->value['button']['label'];?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,'PDFMaker');?>
</button></span>
                            <?php }?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="padding5per">
                            <div class="padding10">
                                <?php echo vtranslate($_smarty_tpl->tpl_vars['arr']->value['desc'],'PDFMaker');?>

                                <?php if ($_smarty_tpl->tpl_vars['arr']->value['exinstall']!=''){?><br><br>
                                <b><?php echo vtranslate('LBL_INSTAL_EXT','PDFMaker');?>
</b><br>
                                <?php echo vtranslate($_smarty_tpl->tpl_vars['arr']->value['exinstall'],'PDFMaker');?>

                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['arr']->value['manual']!=''){?><br><br>
                                <?php echo vtranslate('LBL_CUSTOM_INSTAL_EXT','PDFMaker');?>
<b> <a href="<?php echo $_smarty_tpl->tpl_vars['arr']->value['manual'];?>
" style="cursor: pointer"><?php echo vtranslate($_smarty_tpl->tpl_vars['arr']->value['label'],'PDFMaker');?>
.txt</a></b>
                                <?php }?>
                                <br><br>
                                <div id="install_<?php echo $_smarty_tpl->tpl_vars['extname']->value;?>
_info" class="fontBold<?php if ($_smarty_tpl->tpl_vars['arr']->value['install_info']==''){?> hide<?php }?>"><?php echo $_smarty_tpl->tpl_vars['arr']->value['install_info'];?>
</div>
                            </div>
                        </td>
                    </tr>
                 </tbody>
            </table>
        <?php } ?>                
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
<?php if ($_smarty_tpl->tpl_vars['ERROR']->value=='true'){?>
    alert('<?php echo vtranslate('ALERT_DOWNLOAD_ERROR','PDFMaker');?>
');
<?php }?>    
</script>
   <?php }} ?>