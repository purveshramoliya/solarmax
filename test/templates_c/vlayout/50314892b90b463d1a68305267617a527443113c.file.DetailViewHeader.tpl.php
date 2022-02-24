<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 07:54:44
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/DetailViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6700063695bb1d2c4cbd9d7-38857278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50314892b90b463d1a68305267617a527443113c' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/DetailViewHeader.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6700063695bb1d2c4cbd9d7-38857278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATEID' => 0,
    'FILENAME' => 0,
    'MODULENAME' => 0,
    'EDIT' => 0,
    'MODULE' => 0,
    'DELETE' => 0,
    'IS_BLOCK' => 0,
    'PARENTTAB' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1d2c4d424a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1d2c4d424a')) {function content_5bb1d2c4d424a($_smarty_tpl) {?>
<script>
    function ExportTemplates()
    {
        window.location.href = "index.php?module=PDFMaker&action=ExportPDFTemplate&templates=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
";
    }
</script>        
<div class="detailViewContainer">
    <div class="row-fluid detailViewTitle">
        <div class="row-fluid">
            <div class="span7">
                <div class="row-fluid">
                    <span class="span2"></span>
                    <span class="span8 margin0px">
                        <span class="row-fluid">
                            <span class="recordLabel font-x-x-large textOverflowEllipsis pushDown span" title="<?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
">
                                <span class="templatename"><?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
</span>
                            </span>
                        </span>
                        <span class="row-fluid">
                            <span class="modulename_label"><?php echo vtranslate('LBL_MODULENAMES','PDFMaker');?>
:</span>
                            &nbsp;<?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>

                        </span>
                    </span>
                </div>
            </div>
            <div class="span5">
                <div class="pull-right detailViewButtoncontainer">
                    <div class="btn-toolbar">
                        <?php if ($_smarty_tpl->tpl_vars['EDIT']->value=='permitted'){?>
                            <span class="btn-group">
                              <button class="btn" id="PDFMaker_detailView_basicAction_LBL_EDIT" onclick="window.location.href = 'index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Edit&templateid=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
&return_view=Detail';
    return false;"><strong><?php echo vtranslate('LBL_EDIT');?>
</strong></button>
                            </span>
                            <span class="btn-group">
                                <button class="btn" id="PDFMaker_detailView_basicAction_LBL_DUPLICATE" onclick="window.location.href = 'index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Edit&templateid=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
&isDuplicate=true&return_view=Detail';
    return false;"><strong><?php echo vtranslate('LBL_DUPLICATE');?>
</strong></button>
                            </span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['DELETE']->value=='permitted'){?>
                            <span class="btn-group">
                                <button class="btn" id="PDFMaker_detailView_basicAction_Delete" onclick="deleteRecord('index.php?module=PDFMaker&action=DeletePDFTemplate&templateid=<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
'); return false;" style="font-weight:bold" ><strong><?php echo vtranslate('LBL_DELETE');?>
</strong></button>
                            </span>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detailViewInfo row-fluid">
        <div class="<?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==false){?>span10 details<?php }?>">
            <form id="detailView" method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();">  
                <div class="contents">
                    <input type="hidden" name="action" value="">
                    <input type="hidden" name="view" value="">
                    <input type="hidden" name="module" value="PDFMaker">
                    <input type="hidden" name="retur_module" value="PDFMaker">
                    <input type="hidden" name="return_action" value="PDFMaker">
                    <input type="hidden" name="return_view" value="Detail">
                    <input type="hidden" name="templateid" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
">
                    <input type="hidden" name="parenttab" value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
">
                    <input type="hidden" name="isDuplicate" value="false">
                    <input type="hidden" name="subjectChanged" value="">
                    <input id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEID']->value;?>
" type="hidden"><?php }} ?>