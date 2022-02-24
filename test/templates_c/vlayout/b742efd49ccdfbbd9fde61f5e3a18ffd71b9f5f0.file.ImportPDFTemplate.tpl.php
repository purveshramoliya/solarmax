<?php /* Smarty version Smarty-3.1.7, created on 2018-10-01 08:01:48
         compiled from "/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ImportPDFTemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5686290905bb1d46c540d09-04310227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b742efd49ccdfbbd9fde61f5e3a18ffd71b9f5f0' => 
    array (
      0 => '/home4/kalpdeep/public_html/mpsolar/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ImportPDFTemplate.tpl',
      1 => 1538380338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5686290905bb1d46c540d09-04310227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5bb1d46c599bb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb1d46c599bb')) {function content_5bb1d46c599bb($_smarty_tpl) {?>

<form enctype="multipart/form-data" name="importBasic" method="POST" action="index.php">
    <input type="hidden" name="module" value="PDFMaker">
    <input type="hidden" name="action" value="Import">
    <table style="margin-left: auto;margin-right: auto;width: 100%;" class="searchUIBasic" cellspacing="12">
        <tbody>
            <tr>
                <td class="font-x-large" colspan="2" align="left"><strong><?php echo vtranslate('LBL_PDFMAKER_IMPORT','PDFMaker');?>
</strong></td>
            </tr>
            <tr>
                <td class="leftFormBorder1 importContents" valign="top" width="40%">
                    <table cellpadding="2" cellspacing="0" width="100%">
                        <tbody><tr>
                                <td><strong><?php echo vtranslate('LBL_SELECT_XML','PDFMaker');?>
:</strong></td>
                                <td class="big"><?php echo vtranslate('LBL_SELECT_XML_TEXT','PDFMaker');?>
</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td data-import-upload-size="3145728">
                                    <input name="type" value="xml" type="hidden">
                                    <input name="import_file" id="import_file" onchange="PDFMaker_ImportJs.checkFileType()" type="file">
                                </td>
                            </tr>
                        </tbody>                    </table>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <button type="submit" name="next" class="btn btn-success" onclick="return PDFMaker_ImportJs.uploadAndParse();"><strong><?php echo vtranslate('LBL_NEXT','PDFMaker');?>
</strong></button> &nbsp;&nbsp;
                    <a name="cancel" class="cursorPointer cancelLink" value="Cancel" onclick="location.href = 'index.php?module=Contacts&amp;view=List'"><?php echo vtranslate('LBL_CANCEL');?>
</a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php }} ?>