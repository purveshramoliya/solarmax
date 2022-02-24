<?php /* Smarty version Smarty-3.1.7, created on 2021-02-16 08:49:05
         compiled from "/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1948853676602b8701e9a2a0-58794032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca3cbd1dba6ea663b153e9103106d454eed128d7' => 
    array (
      0 => '/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Detail.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1948853676602b8701e9a2a0-58794032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FILENAME' => 0,
    'DESCRIPTION' => 0,
    'MODULENAME' => 0,
    'IS_BLOCK' => 0,
    'IS_ACTIVE' => 0,
    'IS_DEFAULT' => 0,
    'BODY' => 0,
    'HEADER' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_602b8701ebc54',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_602b8701ebc54')) {function content_602b8701ebc54($_smarty_tpl) {?>
<div style="position: relative;">
    <table class="table table-bordered equalSplit detailview-table">
        <thead>
            <tr>
                <th class="blockHeader" colspan="2"><?php echo vtranslate('LBL_TEMPLATE_INFORMATIONS','PDFMaker');?>
</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fieldLabel narrowWidthType" style="width:25%;"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PDF_NAME','PDFMaker');?>
</label></td>
                <td class="fieldValue narrowWidthType" style="width:75%;"><?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
</td>
            </tr>
            <tr>
                <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DESCRIPTION','PDFMaker');?>
</label></td>
                <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</td>
            </tr>
            <tr>
                <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MODULENAMES','PDFMaker');?>
</label></td>
                <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['MODULENAME']->value;?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==false){?>
                <tr>
                    <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Status');?>
</label></td>
                    <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['IS_ACTIVE']->value;?>
</td>
                </tr>
                <tr>
                    <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SETASDEFAULT','PDFMaker');?>
</label></td>
                    <td class="fieldValue narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT']->value;?>
</td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==false){?>
        <div class="row-fluid paddingTop20">
            <div class="span12">
                    <strong><?php echo vtranslate('LBL_PDF_TEMPLATE','PDFMaker');?>
</strong>
            </div>
        </div>
        <br>
        <ul class="nav nav-tabs massEditTabs" style="margin-bottom: 0;border-bottom: 0">
            <li id="assignedToRoleTab" class="active">
                <a href="#templateBodyTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_BODY','PDFMaker');?>
</strong></a>
            </li>
            <li class="">
                <a href="#templateHeaderTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_HEADER_TAB','PDFMaker');?>
</strong></a>
            </li>
            <li id="assignedToRoleTab">
                <a href="#templateFooterTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_FOOTER_TAB','PDFMaker');?>
</strong></a>
            </li>
        </ul>
    <?php }?>
    <div class="tab-content layoutContent padding20 themeTableColor overflowVisible" style="position: relative;">
        <div class="tab-pane active" id="templateBodyTabLayout">
            <div class="row-fluid">
                <div id="previewcontent_body" class="hide"><?php echo $_smarty_tpl->tpl_vars['BODY']->value;?>
</div>           
                <iframe id="preview_body" class="row-fluid" style="height:1200px;"></iframe>
            </div>  
        </div>
        <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==false){?>
            <div class="tab-pane" id="templateHeaderTabLayout">
                <div class="row-fluid">
                    <div id="previewcontent_header" class="hide"><?php echo $_smarty_tpl->tpl_vars['HEADER']->value;?>
</div>
                    <iframe id="preview_header" class="row-fluid" style="height:500px;"></iframe>
                </div>
            </div>
            <div class="tab-pane" id="templateFooterTabLayout">
                <div class="row-fluid">
                    <div id="previewcontent_footer" class="hide"><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
</div>
                    <iframe id="preview_footer" class="row-fluid" style="height:500px;"></iframe>
                </div>
            </div>
        <?php }?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        PDFMaker_Detail_Js.setPreviewContent('body');
        <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==false){?>
            PDFMaker_Detail_Js.setPreviewContent('header');
            PDFMaker_Detail_Js.setPreviewContent('footer');
        <?php }?>
    });
    </script>        
</div>
<?php }} ?>