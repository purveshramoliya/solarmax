<?php /* Smarty version Smarty-3.1.7, created on 2018-10-16 21:11:03
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditAndExport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12862378415bc653e7d75e51-55921905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c393121c3f38e7a385a2c9abb5a6448500b41e6' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/EditAndExport.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12862378415bc653e7d75e51-55921905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMMONTEMPLATEIDS' => 0,
    'RECORDS' => 0,
    'TEMPLATE_SELECT' => 0,
    'PDF_DIVS' => 0,
    'FOLDER_OPTIONS' => 0,
    'ST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bc653e7ea4ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc653e7ea4ba')) {function content_5bc653e7ea4ba($_smarty_tpl) {?>
<div class="padding20" id="composePDFContainer"><form class="form-horizontal" id="editPDFForm" method="post" action="index.php" enctype="multipart/form-data" name="editPDFForm"><input type="hidden" name="action" id="action" value='CreatePDFFromTemplate' /><input type="hidden" name="module" value="PDFMaker"/><input type="hidden" name="commontemplateid" value='<?php echo $_smarty_tpl->tpl_vars['COMMONTEMPLATEIDS']->value;?>
' /><input type="hidden" name="template_ids" value='<?php echo $_smarty_tpl->tpl_vars['COMMONTEMPLATEIDS']->value;?>
' /><input type="hidden" name="idslist" value="<?php echo $_smarty_tpl->tpl_vars['RECORDS']->value;?>
" /><input type="hidden" name="relmodule" value="<?php echo $_REQUEST['formodule'];?>
" /><input type="hidden" name="language" value='<?php echo $_REQUEST['language'];?>
' /><input type="hidden" name="pmodule" value="<?php echo $_REQUEST['formodule'];?>
" /><input type="hidden" name="pid" value="<?php echo $_REQUEST['record'];?>
" /><input type="hidden" name="mode" value="edit" /><input type="hidden" name="print" value="" /><div id='editTemplate'><div><h3><?php echo vtranslate('LBL_EDIT');?>
 <?php echo vtranslate('LBL_AND');?>
 <?php echo vtranslate('LBL_EXPORT','PDFMaker');?>
</h3><hr style='margin:5px 0;width:100%'></div><div class="row-fluid" style="margin-bottom:7px;"><div class="span6"><div class="modal-body tabbable" style="padding:0px;"><ul class="nav nav-pills" style="margin-bottom:0px; padding-left:5px;"><li class="active" id="body_tab_a" onclick="showHideTab('body');"><a data-toggle="tab1" href="javascript:void(0);"><?php echo vtranslate('LBL_BODY','PDFMaker');?>
</a></li><li id="header_tab_a" onclick="showHideTab('header');"><a data-toggle="tab1" href="javascript:void(0);"><?php echo vtranslate('LBL_HEADER_TAB','PDFMaker');?>
</a></li><li id="footer_tab_a" onclick="showHideTab('footer');"><a data-toggle="tab1" href="javascript:void(0);"><?php echo vtranslate('LBL_FOOTER_TAB','PDFMaker');?>
</a></li></ul></div></div><div class="span6"><span class="pull-right"><?php echo vtranslate('LBL_TEMPLATE','PDFMaker');?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_SELECT']->value;?>
</span></div></div><?php echo $_smarty_tpl->tpl_vars['PDF_DIVS']->value;?>
<div class="padding-bottom1per row-fluid"><div class="span8"><div class="btn-toolbar"><span class="btn-group"><button class="floatNone btn btn-success" id="PDFExportButton" type="submit" title="<?php echo vtranslate('LBL_EXPORT_TO_PDF','PDFMaker');?>
"><strong><?php echo vtranslate('LBL_EXPORT_TO_PDF','PDFMaker');?>
</strong></button></span><span class="btn-group"><button class="floatNone btn btn-success" id="SavePDFAsDocButton" title="<?php echo vtranslate('LBL_SAVEASDOC','PDFMaker');?>
" onclick="return showDocSettings();"><strong><?php echo vtranslate('LBL_SAVEASDOC','PDFMaker');?>
</strong></button></span></div></div></div></div><div id="docSettings" class="hide"><div><h3><?php echo vtranslate("LBL_SAVEASDOC",'PDFMaker');?>
</h3><hr style='margin:5px 0;width:100%'></div><table border="0" cellspacing="0" cellpadding="5" width="100%" align="center"><tr><td class="small"><table border="0" cellspacing="0" cellpadding="5" width="100%" align="center"><tr><td class="dvtCellLabel" width="20%" align="right"><font color="red">*</font><?php echo vtranslate("Title",'Documents');?>
</td><td class="dvtCellInfo" width="80%" align="left"><input name="notes_title" type="text" class="detailedViewTextBox"></td></tr><tr><td class="dvtCellLabel" width="20%" align="right"><?php echo vtranslate("Folder Name",'Documents');?>
</td><td class="dvtCellInfo" width="80%" align="left"><select name="folderid" class="small"><?php echo $_smarty_tpl->tpl_vars['FOLDER_OPTIONS']->value;?>
</select></td></tr><tr><td class="dvtCellLabel" width="20%" align="right"><?php echo vtranslate("Note",'Documents');?>
</td><td class="dvtCellInfo" width="80%" align="left"><textarea name="notecontent" class="detailedViewTextBox"></textarea></td></tr></table></td></tr></table><div class="padding-bottom1per row-fluid"><div class="span8"><div class="btn-toolbar"><span class="btn-group"><button class="floatNone btn btn-success saveIntoDoc" type="button" title="<?php echo vtranslate('LBL_SAVE','PDFMaker');?>
"><strong><?php echo vtranslate('LBL_SAVE','PDFMaker');?>
</strong></button></span><span class="btn-group"><button class="floatNone btn btn-danger cancelDocDiv" type="button" title="<?php echo vtranslate('LBL_CANCEL','PDFMaker');?>
"><strong><?php echo vtranslate('LBL_CANCEL','PDFMaker');?>
</strong></button></span></div></div></div></div></form></div><div id="alert_doc_title" class="hide"><?php echo vtranslate('ALERT_DOC_TITLE','PDFMaker');?>
</div>
<script type="text/javascript">
var selectedTab = 'body';
var selectedTemplate = '<?php echo $_smarty_tpl->tpl_vars['ST']->value;?>
';
document.getElementById('body_div' + selectedTemplate).style.display = 'block';
function changeTemplate(newtemplate){

    jQuery('#'+selectedTab + '_div' + selectedTemplate).hide();
    jQuery('#'+selectedTab + '_div' + newtemplate).show();

    selectedTemplate = newtemplate;
}

function showDocSettings(){
    jQuery('#editTemplate').hide();
    jQuery('#docSettings').show();
    document.getElementById('action').value = 'SaveIntoDocuments';
    
    return false;
}

function printPDF(){
    jQuery('input[name="print"]').val('true');
    return true;
}


function showHideTab(tabname){
    jQuery('#' + selectedTab + '_tab_a').removeClass("active");
    jQuery('#' + tabname + '_tab_a').addClass("active");

    jQuery('#'+selectedTab + '_div' + selectedTemplate).hide();
    jQuery('#'+tabname + '_div' + selectedTemplate).show();
    var formerTab = selectedTab;
    selectedTab = tabname;
}
</script><?php }} ?>