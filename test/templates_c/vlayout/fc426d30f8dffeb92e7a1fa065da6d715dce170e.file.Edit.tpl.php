<?php /* Smarty version Smarty-3.1.7, created on 2021-03-13 03:41:22
         compiled from "/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:455235071604c34622e6d39-97611527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc426d30f8dffeb92e7a1fa065da6d715dce170e' => 
    array (
      0 => '/home/customer/www/mps.magento2solution.com/public_html/includes/runtime/../../layouts/vlayout/modules/PDFMaker/Edit.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '455235071604c34622e6d39-97611527',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PARENTTAB' => 0,
    'SAVETEMPLATEID' => 0,
    'DUPLICATE_TEMPLATEID' => 0,
    'ANNOUNCEMENT' => 0,
    'announcement' => 0,
    'EMODE' => 0,
    'DUPLICATE_FILENAME' => 0,
    'FILENAME' => 0,
    'MODULE' => 0,
    'IS_BLOCK' => 0,
    'TYPE' => 0,
    'SELECTMODULE' => 0,
    'TEMPLATEBLOCKTYPE' => 0,
    'PDF_TEMPLATE_RESULT' => 0,
    'TEMPLATEID' => 0,
    'MODULENAMES' => 0,
    'SELECT_MODULE_FIELD' => 0,
    'RELATED_MODULES' => 0,
    'RelMod' => 0,
    'RELATED_BLOCKS' => 0,
    'HEAD_FOOT_VARS' => 0,
    'ACCOUNTINFORMATIONS' => 0,
    'CUI_BLOCKS' => 0,
    'USERINFORMATIONS' => 0,
    'GLOBAL_LANG_LABELS' => 0,
    'MODULE_LANG_LABELS' => 0,
    'CUSTOM_LANG_LABELS' => 0,
    'IS_LISTVIEW_CHECKED' => 0,
    'LISTVIEW_BLOCK_TPL' => 0,
    'MULTICOMPANYINFORMATIONS' => 0,
    'LBL_MULTICOMPANY' => 0,
    'INVENTORYTERMSANDCONDITIONS' => 0,
    'DATE_VARS' => 0,
    'CUSTOM_FUNCTIONS' => 0,
    'BLOCK_TYPES' => 0,
    'BLOCK_TYPE' => 0,
    'BLOCKID' => 0,
    'BLOCK_TYPE_DATA' => 0,
    'DH_ALL' => 0,
    'DH_FIRST' => 0,
    'DH_OTHER' => 0,
    'DF_ALL' => 0,
    'DF_FIRST' => 0,
    'DF_OTHER' => 0,
    'DF_LAST' => 0,
    'PRODUCT_BLOC_TPL' => 0,
    'ARTICLE_STRINGS' => 0,
    'SELECT_PRODUCT_FIELD' => 0,
    'PRODUCTS_FIELDS' => 0,
    'SERVICES_FIELDS' => 0,
    'FORMATS' => 0,
    'SELECT_FORMAT' => 0,
    'CUSTOM_FORMAT' => 0,
    'ORIENTATIONS' => 0,
    'SELECT_ORIENTATION' => 0,
    'DECIMALS' => 0,
    'margin_input_width' => 0,
    'MARGINS' => 0,
    'WATERMARK' => 0,
    'MAX_UPLOAD_LIMIT_BYTES' => 0,
    'MAX_UPLOAD_LIMIT_MB' => 0,
    'NAME_OF_FILE' => 0,
    'FILENAME_FIELDS' => 0,
    'SELECT_MODULE_FIELD_FILENAME' => 0,
    'PDF_PASSWORD' => 0,
    'DESCRIPTION' => 0,
    'IGNORE_PICKLIST_VALUES' => 0,
    'STATUS' => 0,
    'IS_ACTIVE' => 0,
    'IS_DEFAULT_DV_CHECKED' => 0,
    'IS_DEFAULT_LV_CHECKED' => 0,
    'ORDER' => 0,
    'IS_PORTAL_CHECKED' => 0,
    'TEMPLATE_OWNERS' => 0,
    'TEMPLATE_OWNER' => 0,
    'SHARINGTYPES' => 0,
    'SHARINGTYPE' => 0,
    'APP' => 0,
    'GROUPNAME' => 0,
    'MEMBER' => 0,
    'element' => 0,
    'RECORD_STRUCTURE' => 0,
    'ITS4YOUSTYLE_FILES' => 0,
    'BODY' => 0,
    'HEADER' => 0,
    'FOOTER' => 0,
    'STYLES_CONTENT' => 0,
    'STYLE_DATA' => 0,
    'VERSION' => 0,
    'ROLEIDSTR' => 0,
    'ROLENAMESTR' => 0,
    'USERIDSTR' => 0,
    'USERNAMESTR' => 0,
    'GROUPIDSTR' => 0,
    'GROUPNAMESTR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_604c346257242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_604c346257242')) {function content_604c346257242($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/customer/www/mps.magento2solution.com/public_html/libraries/Smarty/libs/plugins/function.html_options.php';
?>
<div class='editViewContainer'>
    <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="module" value="PDFMaker">
        <input type="hidden" name="parenttab" value="<?php echo $_smarty_tpl->tpl_vars['PARENTTAB']->value;?>
">
        <input type="hidden" name="templateid" id="templateid" value="<?php echo $_smarty_tpl->tpl_vars['SAVETEMPLATEID']->value;?>
">
        <?php if ($_smarty_tpl->tpl_vars['DUPLICATE_TEMPLATEID']->value!=''){?><input type="hidden" name="duplicate_templateid" id="duplicate_templateid" value="<?php echo $_smarty_tpl->tpl_vars['DUPLICATE_TEMPLATEID']->value;?>
"><?php }?>
        <input type="hidden" name="action" value="SavePDFTemplate">
        <input type="hidden" name="redirect" value="true">
        <input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module'];?>
">
        <input type="hidden" name="return_view" value="<?php echo $_REQUEST['return_view'];?>
">
        <input type="hidden" name="selectedTab" id="selectedTab" value="basic">
        <?php $_smarty_tpl->tpl_vars["announcement"] = new Smarty_variable($_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement'), null, 0);?>
        <input type="hidden" name="announcement_val" id="announcement_val" value="<?php if (!empty($_smarty_tpl->tpl_vars['announcement']->value)){?>1<?php }else{ ?>0<?php }?>">
        <input type="hidden" name="selectedTab2" id="selectedTab2" value="body">
        <div class="contentHeader row-fluid">
            <?php if ($_smarty_tpl->tpl_vars['EMODE']->value=='edit'){?>
                <?php if ($_smarty_tpl->tpl_vars['DUPLICATE_FILENAME']->value==''){?>
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="<?php echo vtranslate('LBL_EDIT','PDFMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
&quot;"><?php echo vtranslate('LBL_EDIT','PDFMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
&quot;</span>
                <?php }else{ ?>
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="<?php echo vtranslate('LBL_DUPLICATE','PDFMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['DUPLICATE_FILENAME']->value;?>
&quot;"><?php echo vtranslate('LBL_DUPLICATE','PDFMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['DUPLICATE_FILENAME']->value;?>
&quot;</span>
                <?php }?>
            <?php }else{ ?>
                <span class="span8 font-x-x-large textOverflowEllipsis"><?php echo vtranslate('LBL_NEW_TEMPLATE','PDFMaker');?>
</span>
            <?php }?>
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';"><strong><?php echo vtranslate('LBL_APPLY','PDFMaker');?>
</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" ><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
                <?php if ($_REQUEST['return_view']!=''){?>
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module=<?php if ($_REQUEST['return_module']!=''){?><?php echo $_REQUEST['return_module'];?>
<?php }else{ ?>PDFMaker<?php }?>&view=<?php echo $_REQUEST['return_view'];?>
<?php if ($_REQUEST['templateid']!=''&&$_REQUEST['return_view']!="List"){?>&templateid=<?php echo $_REQUEST['templateid'];?>
<?php }?>';"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }?>         			
            </span>
       </div>
        <div id="edit-template-header_content" class="edit-template-header_content row-fluid">
            <div class="span12" style="z-index:1000;">
                <div class="modal-body tabbable" style="padding:0px;background-color:#ffffff">
                     <ul class="nav nav-tabs massEditTabs" style="margin-bottom:0px; padding-left:5px;">
                         <li id="basic_tab" onclick="PDFMaker_EditJs.showHideTab('basic');" class="active"><a data-toggle="tab" href="#basic_div"><?php echo vtranslate('LBL_BASIC_TAB','PDFMaker');?>
</a></li>
                         <li id="company_tab" onclick="PDFMaker_EditJs.showHideTab('company');"><a data-toggle="tab" href="#company_div"><?php echo vtranslate('LBL_OTHER_INFO','PDFMaker');?>
</a></li>
                         <li id="labels_tab" onclick="PDFMaker_EditJs.showHideTab('labels');"><a data-toggle="tab" href="#labels_div"><?php echo vtranslate('LBL_LABELS','PDFMaker');?>
</a></li>
                         <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                             <li id="products_tab" onclick="PDFMaker_EditJs.showHideTab('products');"><a data-toggle="tab" href="#products_div"><?php echo vtranslate('LBL_ARTICLE','PDFMaker');?>
</a></li>
                             <li id="headerfooter_tab" onclick="PDFMaker_EditJs.showHideTab('headerfooter');"><a data-toggle="tab" href="#headerfooter_div"><?php echo vtranslate('LBL_HEADER_TAB','PDFMaker');?>
 / <?php echo vtranslate('LBL_FOOTER_TAB','PDFMaker');?>
</a></li>
                             <li id="properties_tab" onclick="PDFMaker_EditJs.showHideTab('properties');"><a data-toggle="tab" href="#properties_div"><?php echo vtranslate('LBL_PROPERTIES_TAB','PDFMaker');?>
</a></li>
                             <li id="settings_tab" onclick="PDFMaker_EditJs.showHideTab('settings');"><a data-toggle="tab" href="#settings_div"><?php echo vtranslate('LBL_SETTINGS_TAB','PDFMaker');?>
</a></li>
                             <li id="sharing_tab" onclick="PDFMaker_EditJs.showHideTab('sharing');"><a data-toggle="tab" href="#sharing_div"><?php echo vtranslate('LBL_SHARING_TAB','PDFMaker');?>
</a></li>
                             <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                                 <li id="display_tab" onclick="PDFMaker_EditJs.showHideTab('display');" <?php if ($_smarty_tpl->tpl_vars['SELECTMODULE']->value==''){?>style="display:none"<?php }?>><a data-toggle="tab" href="#display_div"><?php echo vtranslate('LBL_DISPLAY_TAB','PDFMaker');?>
</a></li>
                             <?php }?>
                         <?php }?>
                     </ul>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="tab-content layoutContent themeTableColor overflowVisible " >
                    <div class="edit-template-content" style="z-index:1000;">
                        
                        <table class="table table-bordered blockContainer " >
                            <tbody id="basic_div" >
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php echo vtranslate('LBL_PDF_NAME','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input name="filename" id="filename" type="text" value="<?php echo $_smarty_tpl->tpl_vars['FILENAME']->value;?>
" class="detailedViewTextBox span11" tabindex="1"></td>
                                </tr>
                                <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value==true){?>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Type','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <?php if ($_smarty_tpl->tpl_vars['SAVETEMPLATEID']->value!=''&&$_smarty_tpl->tpl_vars['TEMPLATEBLOCKTYPE']->value!=''){?>
                                                <?php echo $_smarty_tpl->tpl_vars['TEMPLATEBLOCKTYPE']->value;?>

                                                <input type="hidden" name="blocktype" id="blocktype" value="<?php echo $_smarty_tpl->tpl_vars['TEMPLATEBLOCKTYPE']->value;?>
">
                                            <?php }else{ ?>
                                                <select name="blocktype" id="blocktype" class="chzn-select span5" data-rule-required="true">
                                                    <option value="header" <?php if ($_smarty_tpl->tpl_vars['PDF_TEMPLATE_RESULT']->value['type']=="header"){?>selected<?php }?>><?php echo vtranslate('Header',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
                                                    <option value="footer" <?php if ($_smarty_tpl->tpl_vars['PDF_TEMPLATE_RESULT']->value['type']=="footer"){?>selected<?php }?>><?php echo vtranslate('Footer',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
                                                </select>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php }?>

                                
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px"><?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value==''&&$_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?><span class="redColor">*</span><?php }?><?php echo vtranslate('LBL_MODULENAMES','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="modulename" id="modulename" class="chzn-select span12">
                                                <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value!=''||$_smarty_tpl->tpl_vars['SELECTMODULE']->value!=''){?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULENAMES']->value,'selected'=>$_smarty_tpl->tpl_vars['SELECTMODULE']->value),$_smarty_tpl);?>

                                                <?php }else{ ?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULENAMES']->value),$_smarty_tpl);?>

                                                <?php }?>
                                            </select>
                                        </div><br>
                                        <div class="row-fluid ">
                                            <div class="span10">
                                                <select name="modulefields" id="modulefields" class="chzn-select row-fluid">
                                                    <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value==''&&$_smarty_tpl->tpl_vars['SELECTMODULE']->value==''){?>
                                                        <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker');?>
</option>
                                                    <?php }else{ ?>
                                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_MODULE_FIELD']->value),$_smarty_tpl);?>

                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="modulefields"  title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="modulefields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr id="body_variables">
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_RELATED_MODULES','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="relatedmodulesorce" id="relatedmodulesorce" class="chzn-select row-fluid">
                                                <option value=""><?php echo vtranslate('LBL_SELECT_MODULE','PDFMaker');?>
</option>
                                                <?php  $_smarty_tpl->tpl_vars['RelMod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RelMod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RelMod']->key => $_smarty_tpl->tpl_vars['RelMod']->value){
$_smarty_tpl->tpl_vars['RelMod']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[0];?>
" data-module="<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[3];?>
"><?php echo $_smarty_tpl->tpl_vars['RelMod']->value[1];?>
 (<?php echo $_smarty_tpl->tpl_vars['RelMod']->value[2];?>
)</option>
                                                <?php } ?>
                                            </select>                                &nbsp;&nbsp;
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span10">
                                                <select name="relatedmodulefields" id="relatedmodulefields" class="chzn-select row-fluid">
                                                    <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker');?>
</option>
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="relatedmodulefields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button><button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="relatedmodulefields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                                    
                                    <tr id="related_block_tpl_row">
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_RELATED_BLOCK_TPL','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <select name="related_block" id="related_block" class="chzn-select span4" >
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['RELATED_BLOCKS']->value),$_smarty_tpl);?>

                                            </select>
                                            <button type="button" class="btn btn-success marginLeftZero" onclick="PDFMaker_EditJs.InsertRelatedBlock();" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                            <button type="button" class="btn addButton marginLeftZero" onclick="PDFMaker_EditJs.CreateRelatedBlock();"><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate('LBL_CREATE');?>
</strong></button>
                                            <button type="button" class="btn marginLeftZero" onclick="PDFMaker_EditJs.EditRelatedBlock();"><?php echo vtranslate('LBL_EDIT');?>
</button>
                                            <button class="btn btn-danger marginLeftZero" class="crmButton small delete" onclick="PDFMaker_EditJs.DeleteRelatedBlock();"><?php echo vtranslate('LBL_DELETE');?>
</button>
                                        </td>
                                    </tr>

                                <?php }else{ ?>
                                    
                                    <tr id="header_variables">
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_HEADER_FOOTER_VARIABLES','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="header_var" id="header_var" class="classname">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['HEAD_FOOT_VARS']->value,'selected'=>''),$_smarty_tpl);?>

                                            </select>
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="header_var" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>

                                        </td>
                                    </tr>
                                <?php }?>


                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_COMPANY_INFO','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span10">
                                            <select name="acc_info" id="acc_info" class="chzn-select row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ACCOUNTINFORMATIONS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="btn-group span2">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="acc_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                            <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="acc_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SELECT_USER_INFO','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="acc_info_type" id="acc_info_type" class="chzn-select span12" onChange="PDFMaker_EditJs.change_acc_info(this)">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUI_BLOCKS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <br>
                                        <div id="user_info_div" class="au_info_div row-fluid" style="display:inline;">
                                            <div class="span10">
                                                <select name="user_info" id="user_info" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['a']),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="logged_user_info_div" class="au_info_div row-fluid" style="display:none;">
                                            <div class="span10">
                                                <select name="logged_user_info" id="logged_user_info" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['l']),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="logged_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="logged_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="modifiedby_user_info_div" class="au_info_div row-fluid" style="display:none;">
                                            <div class="span10">
                                                <select name="modifiedby_user_info" id="modifiedby_user_info" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['m']),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="modifiedby_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="modifiedby_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="smcreator_user_info_div" class="au_info_div row-fluid hide">
                                            <div class="span10">
                                                <select name="smcreator_user_info" id="smcreator_user_info" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['USERINFORMATIONS']->value['c']),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero"  data-type="smcreator_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="smcreator_user_info" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            
                            <tbody style="display:none;" id="labels_div">
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_GLOBAL_LANG','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="global_lang" id="global_lang" class="chzn-select row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['GLOBAL_LANG_LABELS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-warning InsertIntoTemplate marginLeftZero" data-type="global_lang" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MODULE_LANG','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="module_lang" id="module_lang" class="chzn-select row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MODULE_LANG_LABELS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                        <button type="button" class="btn btn-warning InsertIntoTemplate marginLeftZero" data-type="module_lang" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CUSTOM_LABELS','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="custom_lang" id="custom_lang" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUSTOM_LANG_LABELS']->value),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                                <button type="button" class="btn btn-warning marginLeftZero InsertIntoTemplate" data-type="custom_lang" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>T</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>

                            </tbody>
                            
                            <tbody style="display:none;" id="company_div">
                                <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                                    <tr id="listview_block_tpl_row">
                                        <td class="fieldLabel">
                                            <label class="muted pull-right marginRight10px"><input type="checkbox" name="is_listview" id="isListViewTmpl" <?php echo $_smarty_tpl->tpl_vars['IS_LISTVIEW_CHECKED']->value;?>
 onclick="PDFMaker_EditJs.isLvTmplClicked();" title="<?php echo vtranslate('LBL_LISTVIEW_TEMPLATE','PDFMaker');?>
" />
                                                <?php echo vtranslate('LBL_LISTVIEWBLOCK','PDFMaker');?>
:</label>
                                        </td>
                                        <td class="fieldValue" colspan="3">
                                                    <span>
                                                    <select name="listviewblocktpl" id="listviewblocktpl" class="chzn-select">
                                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['LISTVIEW_BLOCK_TPL']->value),$_smarty_tpl);?>

                                                    </select>
                                                    </span>
                                            <button type="button" id="listviewblocktpl_butt" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="listviewblocktpl" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </td>
                                    </tr>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['MULTICOMPANYINFORMATIONS']->value!=''){?>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo $_smarty_tpl->tpl_vars['LBL_MULTICOMPANY']->value;?>
:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="multicomapny" id="multicomapny" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['MULTICOMPANYINFORMATIONS']->value),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="multicomapny" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('TERMS_AND_CONDITIONS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="invterandcon" id="invterandcon" class="chzn-select row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['INVENTORYTERMSANDCONDITIONS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="invterandcon" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CURRENT_DATE','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="dateval" id="dateval" class="chzn-select row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['DATE_VARS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="dateval" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_BARCODES','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span9">
                                            <select name="barcodeval" id="barcodeval" class="chzn-select row-fluid">
                                                <optgroup label="<?php echo vtranslate('LBL_BARCODES_TYPE1','PDFMaker');?>
">
                                                    <option value="EAN13">EAN13</option>
                                                    <option value="ISBN">ISBN</option>
                                                    <option value="ISSN">ISSN</option>
                                                </optgroup>

                                                <optgroup label="<?php echo vtranslate('LBL_BARCODES_TYPE2','PDFMaker');?>
">
                                                    <option value="UPCA">UPCA</option>
                                                    <option value="UPCE">UPCE</option>
                                                    <option value="EAN8">EAN8</option>
                                                </optgroup>

                                                <optgroup label="<?php echo vtranslate('LBL_BARCODES_TYPE3','PDFMaker');?>
">
                                                    <option value="EAN2">EAN2</option>
                                                    <option value="EAN5">EAN5</option>
                                                    <option value="EAN13P2">EAN13P2</option>
                                                    <option value="ISBNP2">ISBNP2</option>
                                                    <option value="ISSNP2">ISSNP2</option>
                                                    <option value="UPCAP2">UPCAP2</option>
                                                    <option value="UPCEP2">UPCEP2</option>
                                                    <option value="EAN8P2">EAN8P2</option>
                                                    <option value="EAN13P5">EAN13P5</option>
                                                    <option value="ISBNP5">ISBNP5</option>
                                                    <option value="ISSNP5">ISSNP5</option>
                                                    <option value="UPCAP5">UPCAP5</option>
                                                    <option value="UPCEP5">UPCEP5</option>
                                                    <option value="EAN8P5">EAN8P5</option>
                                                </optgroup>

                                                <optgroup label="<?php echo vtranslate('LBL_BARCODES_TYPE4','PDFMaker');?>
">
                                                    <option value="IMB">IMB</option>
                                                    <option value="RM4SCC">RM4SCC</option>
                                                    <option value="KIX">KIX</option>
                                                    <option value="POSTNET">POSTNET</option>
                                                    <option value="PLANET">PLANET</option>
                                                </optgroup>

                                                <optgroup label="<?php echo vtranslate('LBL_BARCODES_TYPE5','PDFMaker');?>
">
                                                    <option value="C128A">C128A</option>
                                                    <option value="C128B">C128B</option>
                                                    <option value="C128C">C128C</option>
                                                    <option value="EAN128C">EAN128C</option>
                                                    <option value="C39">C39</option>
                                                    <option value="C39+">C39+</option>
                                                    <option value="C39E">C39E</option>
                                                    <option value="C39E+">C39E+</option>
                                                    <option value="S25">S25</option>
                                                    <option value="S25+">S25+</option>
                                                    <option value="I25">I25</option>
                                                    <option value="I25+">I25+</option>
                                                    <option value="I25B">I25B</option>
                                                    <option value="I25B+">I25B+</option>
                                                    <option value="C93">C93</option>
                                                    <option value="MSI">MSI</option>
                                                    <option value="MSI+">MSI+</option>
                                                    <option value="CODABAR">CODABAR</option>
                                                    <option value="CODE11">CODE11</option>
                                                </optgroup>

                                                <optgroup label="<?php echo vtranslate('LBL_QRCODE','PDFMaker');?>
">
                                                    <option value="QR">QR</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="btn-group span3">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="barcodeval" alt="<?php echo vtranslate('LBL_INSERT_BARCODE_TO_TEXT','PDFMaker');?>
" title="<?php echo vtranslate('LBL_INSERT_BARCODE_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>&nbsp;&nbsp;
                                            <a href="index.php?module=PDFMaker&view=IndexAjax&mode=showBarcodes" target="_new"><button type="button" class="btn"><i class="icon-info-sign"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                                
                                <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('CUSTOM_FUNCTIONS','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="customfunction" id="customfunction" class="chzn-select row-fluid">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['CUSTOM_FUNCTIONS']->value),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="customfunction" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                            
                            <tbody style="display:none;" id="headerfooter_div">
                                <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                                    
                                    <?php  $_smarty_tpl->tpl_vars['BLOCK_TYPE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_TYPE']->_loop = false;
 $_smarty_tpl->tpl_vars['BLOCKID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BLOCK_TYPES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_TYPE']->key => $_smarty_tpl->tpl_vars['BLOCK_TYPE']->value){
$_smarty_tpl->tpl_vars['BLOCK_TYPE']->_loop = true;
 $_smarty_tpl->tpl_vars['BLOCKID']->value = $_smarty_tpl->tpl_vars['BLOCK_TYPE']->key;
?>
                                        <tr id="header_variables">
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo $_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["name"];?>
:</label></td>
                                            <td class="fieldValue " colspan="3">
                                                <div class="blocktypeselect row-fluid">
                                                    <select name="blocktype<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
_val" id="blocktype<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
_val" data-type="<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
" class="chzn-select">
                                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["types"],'selected'=>$_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["selected"]),$_smarty_tpl);?>

                                                    </select>
                                                </div>
                                                <div id="blocktype<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
" class="" <?php if ($_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["selected"]=="custom"){?>style="display:none"<?php }?>>
                                                    <br>
                                                    <select name="blocktype<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
_list" id="blocktype<?php echo $_smarty_tpl->tpl_vars['BLOCKID']->value;?>
_list" class="chzn-select row-fluid">
                                                        <?php  $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["list"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->key => $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->value){
$_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->_loop = true;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->value["templateid"];?>
" <?php if ($_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->value["templateid"]==$_smarty_tpl->tpl_vars['BLOCK_TYPE']->value["selectedid"]){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['BLOCK_TYPE_DATA']->value["name"];?>
</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php }?>
                                

                                <tr id="header_variables">
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_HEADER_FOOTER_VARIABLES','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="header_var" id="header_var" class="classname">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['HEAD_FOOT_VARS']->value,'selected'=>''),$_smarty_tpl);?>

                                        </select>
                                        <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="header_var" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DISPLAY_HEADER','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <b><?php echo vtranslate('LBL_ALL_PAGES','PDFMaker');?>
</b>&nbsp;<input type="checkbox" id="dh_allid" name="dh_all" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" <?php echo $_smarty_tpl->tpl_vars['DH_ALL']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_FIRST_PAGE','PDFMaker');?>
&nbsp;<input type="checkbox" id="dh_firstid" name="dh_first" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" <?php echo $_smarty_tpl->tpl_vars['DH_FIRST']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_OTHER_PAGES','PDFMaker');?>
&nbsp;<input type="checkbox" id="dh_otherid" name="dh_other" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" <?php echo $_smarty_tpl->tpl_vars['DH_OTHER']->value;?>
/>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DISPLAY_FOOTER','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <b><?php echo vtranslate('LBL_ALL_PAGES','PDFMaker');?>
</b>&nbsp;<input type="checkbox" id="df_allid" name="df_all" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" <?php echo $_smarty_tpl->tpl_vars['DF_ALL']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_FIRST_PAGE','PDFMaker');?>
&nbsp;<input type="checkbox" id="df_firstid" name="df_first" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" <?php echo $_smarty_tpl->tpl_vars['DF_FIRST']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_OTHER_PAGES','PDFMaker');?>
&nbsp;<input type="checkbox" id="df_otherid" name="df_other" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" <?php echo $_smarty_tpl->tpl_vars['DF_OTHER']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_LAST_PAGE','PDFMaker');?>
&nbsp;<input type="checkbox" id="df_lastid" name="df_last" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" <?php echo $_smarty_tpl->tpl_vars['DF_LAST']->value;?>
/>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>

                            
                            <tbody style="display:none;" id="products_div">
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PRODUCT_BLOC_TPL','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="productbloctpl2" id="productbloctpl2" class="classname row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['PRODUCT_BLOC_TPL']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="productbloctpl2" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"/><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_ARTICLE','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="articelvar" id="articelvar" class="classname row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ARTICLE_STRINGS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="articelvar" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_PRODUCTS_AVLBL','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="psfields" id="psfields" class="classname row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_PRODUCT_FIELD']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="psfields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_PRODUCTS_FIELDS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="productfields" id="productfields" class="classname row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['PRODUCTS_FIELDS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="productfields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*<?php echo vtranslate('LBL_SERVICES_FIELDS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="servicesfields" id="servicesfields" class="classname row-fluid">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SERVICES_FIELDS']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="servicesfields" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
" alt="<?php echo vtranslate('LBL_INSERT_TO_TEXT','PDFMaker');?>
"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" colspan="4"><label class="muted marginRight10px"><small><?php echo vtranslate('LBL_PRODUCT_FIELD_INFO','PDFMaker');?>
</small></label></td>
                                </tr>
                            </tbody>
                            
                            <tbody style="display:none;" id="properties_div">
                                
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PDF_FORMAT','PDFMaker');?>
:</label>
                                    </td>
                                    <td class="fieldValue" colspan="3">
                                        <table style="padding:0px; margin:0px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <select name="pdf_format" id="pdf_format" class="chzn-select" onchange="PDFMaker_EditJs.CustomFormat();">
                                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['FORMATS']->value,'selected'=>$_smarty_tpl->tpl_vars['SELECT_FORMAT']->value),$_smarty_tpl);?>

                                                    </select>
                                                </td>
                                                <td style="padding:0">
                                                    <table class="table showInlineTable" id="custom_format_table" <?php if ($_smarty_tpl->tpl_vars['SELECT_FORMAT']->value!='Custom'){?>style="display:none"<?php }?>>
                                                        <tr>
                                                            <td align="right" nowrap><?php echo vtranslate('LBL_WIDTH','PDFMaker');?>
</td>
                                                            <td>
                                                                <input type="text" name="pdf_format_width" id="pdf_format_width" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_FORMAT']->value['width'];?>
" style="width:50px">
                                                            </td>
                                                            <td align="right" nowrap><?php echo vtranslate('LBL_HEIGHT','PDFMaker');?>
</td>
                                                            <td>
                                                                <input type="text" name="pdf_format_height" id="pdf_format_height" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_FORMAT']->value['height'];?>
" style="width:50px">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PDF_ORIENTATION','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="pdf_orientation" id="pdf_orientation" class="chzn-select">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ORIENTATIONS']->value,'selected'=>$_smarty_tpl->tpl_vars['SELECT_ORIENTATION']->value),$_smarty_tpl);?>

                                        </select>
                                    </td>
                                </tr>
                                
                                <?php $_smarty_tpl->tpl_vars['margin_input_width'] = new Smarty_variable('40px', null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['margin_label_width'] = new Smarty_variable('40px', null, 0);?>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DECIMALS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table>
                                            <tr>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_POINT','PDFMaker');?>
</td>
                                                <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['point'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>
                                            </tr>
                                            <tr>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_DECIMALS','PDFMaker');?>
</td>
                                                <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['decimals'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>
                                            </tr>
                                            <tr>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_DEC_THOUSANDS','PDFMaker');?>
</td>
                                                <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['DECIMALS']->value['thousands'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
"/></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_MARGINS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table>
                                            <tr>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_TOP','PDFMaker');?>
</td>
                                                <td>
                                                    <input type="text" name="margin_top" id="margin_top" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['MARGINS']->value['top'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_top', false);">
                                                </td>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_BOTTOM','PDFMaker');?>
</td>
                                                <td>
                                                    <input type="text" name="margin_bottom" id="margin_bottom" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['MARGINS']->value['bottom'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_bottom', false);">
                                                </td>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_LEFT','PDFMaker');?>
</td>
                                                <td>
                                                    <input type="text" name="margin_left"  id="margin_left" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['MARGINS']->value['left'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_left', false);">
                                                </td>
                                                <td align="right" nowrap><?php echo vtranslate('LBL_RIGHT','PDFMaker');?>
</td>
                                                <td>
                                                    <input type="text" name="margin_right" id="margin_right" class="detailedViewTextBox" value="<?php echo $_smarty_tpl->tpl_vars['MARGINS']->value['right'];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['margin_input_width']->value;?>
" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_right', false);">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('Watermark','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td align="right" nowrap width="20%"><?php echo vtranslate('Type',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                                <td>
                                                    <select name="watermark_type" id="watermark_type" class="select2 col-sm-12">
                                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['WATERMARK']->value['types'],'selected'=>$_smarty_tpl->tpl_vars['WATERMARK']->value['type']),$_smarty_tpl);?>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr id="watermark_image_tr" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['type']!="image"){?>class="hide"<?php }?>>
                                                <td align="right" nowrap ><?php echo vtranslate('Image',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                                <td>
                                                    <input type="hidden" name="watermark_img_id" class="inputElement" value="<?php echo $_smarty_tpl->tpl_vars['WATERMARK']->value['image_id'];?>
"/>
                                                    <div id="uploadedWatermarkFileImage" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['image_name']!=''){?>class="hide"<?php }?>>
                                                        <input type="file" name="watermark_image" class="inputElement"/>
                                                        <div class="uploadedFileDetails">
                                                            <div class="uploadedFileSize"></div>
                                                            <div class="uploadFileSizeLimit redColor">
                                                                <?php echo vtranslate('LBL_MAX_UPLOAD_SIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="maxUploadSize" data-value="<?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_LIMIT_BYTES']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_LIMIT_MB']->value;?>
<?php echo vtranslate('MB',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="uploadedWatermarkFileName" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['image_name']==''){?>class="hide"<?php }?>>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['WATERMARK']->value['image_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['WATERMARK']->value['image_name'];?>
</a>
                                                        <span class="deleteWatermarkFile cursorPointer col-lg-1">
                                                                            <i class="alignMiddle fa fa-trash"></i>
                                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="watermark_text_tr" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['type']!="text"){?>class="hide"<?php }?>>
                                                <td align="right" nowrap><?php echo vtranslate('Text',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                                <td><input type="text" name="watermark_text" class="inputElement getPopupUi" value="<?php echo $_smarty_tpl->tpl_vars['WATERMARK']->value['text'];?>
"/></td>
                                            </tr>
                                            <tr id="watermark_alpha_tr" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['type']=="none"){?>class="hide"<?php }?>>
                                                <td align="right" nowrap><?php echo vtranslate('Alpha',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
                                                <td><input type="text" name="watermark_alpha" class="inputElement" <?php if ($_smarty_tpl->tpl_vars['WATERMARK']->value['alpha']==''){?>placeholder="0.1"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['WATERMARK']->value['alpha'];?>
"/></td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            
                            <tbody style="display:none;" id="settings_div">
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_FILENAME','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <input type="text" name="nameOfFile" value="<?php echo $_smarty_tpl->tpl_vars['NAME_OF_FILE']->value;?>
" id="nameOfFile" class="detailedViewTextBox span11 getPopupUi" />
                                        <div class="span11" style="display: none">
                                            <select name="filename_fields" id="filename_fields" class="chzn-select span6" onchange="PDFMaker_EditJs.insertFieldIntoFilename(this.value);">
                                                <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker');?>
</option>
                                                <optgroup label="<?php echo vtranslate('LBL_COMMON_FILEINFO','PDFMaker');?>
">
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['FILENAME_FIELDS']->value),$_smarty_tpl);?>

                                                </optgroup>
                                                <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value!=''||$_smarty_tpl->tpl_vars['SELECTMODULE']->value!=''){?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_MODULE_FIELD_FILENAME']->value),$_smarty_tpl);?>

                                                <?php }?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" title="<?php echo vtranslate('LBL_PDF_PASSWORD','PDFMaker');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_PDF_PASSWORD','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input type="text" name="PDFPassword" value="<?php echo $_smarty_tpl->tpl_vars['PDF_PASSWORD']->value;?>
" id="PDFPassword" class="getPopupUi detailedViewTextBox span11"></td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" title="<?php echo vtranslate('LBL_DESCRIPTION','PDFMaker');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DESCRIPTION','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input name="description" type="text" value="<?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
" class="detailedViewTextBox span11" tabindex="2"></td>
                                </tr>

                                
                                <tr>
                                    <td class="fieldLabel" title="<?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','PDFMaker');?>
"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3" title="<?php echo vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','PDFMaker');?>
"><input type="text" name="ignore_picklist_values" value="<?php echo $_smarty_tpl->tpl_vars['IGNORE_PICKLIST_VALUES']->value;?>
" class="detailedViewTextBox"/></td>
                                </tr>


                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_STATUS','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="is_active" id="is_active" class="classname" onchange="PDFMaker_EditJs.templateActiveChanged(this);">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['STATUS']->value,'selected'=>$_smarty_tpl->tpl_vars['IS_ACTIVE']->value),$_smarty_tpl);?>

                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SETASDEFAULT','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <?php echo vtranslate('LBL_FOR_DV','PDFMaker');?>
&nbsp;&nbsp;<input type="checkbox" id="is_default_dv" name="is_default_dv" <?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT_DV_CHECKED']->value;?>
/>
                                        &nbsp;&nbsp;
                                        <?php echo vtranslate('LBL_FOR_LV','PDFMaker');?>
&nbsp;&nbsp;<input type="checkbox" id="is_default_lv" name="is_default_lv" <?php echo $_smarty_tpl->tpl_vars['IS_DEFAULT_LV_CHECKED']->value;?>
/>
                                        
                                        <input type="hidden" name="tmpl_order" value="<?php echo $_smarty_tpl->tpl_vars['ORDER']->value;?>
" />
                                    </td>
                                </tr>
                                
                                <tr id="is_portal_row" <?php if ($_smarty_tpl->tpl_vars['SELECTMODULE']->value!="Invoice"&&$_smarty_tpl->tpl_vars['SELECTMODULE']->value!="Quotes"){?>style="display: none;"<?php }?>>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SETFORPORTAL','PDFMaker');?>
:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <input type="checkbox" id="is_portal" name="is_portal" <?php echo $_smarty_tpl->tpl_vars['IS_PORTAL_CHECKED']->value;?>
 onclick="return PDFMaker_EditJs.ConfirmIsPortal(this);"/>
                                    </td>
                                </tr>
                            </tbody>
                            <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                                
                                <tbody style="display:none;" id="sharing_div">
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_TEMPLATE_OWNER','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="template_owner" id="template_owner" class="classname">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNERS']->value,'selected'=>$_smarty_tpl->tpl_vars['TEMPLATE_OWNER']->value),$_smarty_tpl);?>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_SHARING_TAB','PDFMaker');?>
:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="sharing" id="sharing" class="classname" onchange="PDFMaker_EditJs.sharing_changed();">
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SHARINGTYPE']->value),$_smarty_tpl);?>

                                            </select>

                                            <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                                                <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
                                                    <tr>
                                                        <td width="40%" valign=top class="cellBottomDotLinePlain small"><strong><?php echo vtranslate('LBL_MEMBER_AVLBL','PDFMaker');?>
</strong></td>
                                                        <td width="10%">&nbsp;</td>
                                                        <td width="40%" class="cellBottomDotLinePlain small"><strong><?php echo vtranslate('LBL_MEMBER_SELECTED','PDFMaker');?>
</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign=top class="small">
                                                            <?php echo vtranslate('LBL_ENTITY','PDFMaker');?>
:&nbsp;
                                                            <select id="sharingMemberType" name="sharingMemberType" class="small" onchange="PDFMaker_EditJs.showSharingMemberTypes()">
                                                                <option value="groups" selected><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_GROUPS'];?>
</option>
                                                                <option value="roles"><?php echo vtranslate('LBL_ROLES','PDFMaker');?>
</option>
                                                                <option value="rs"><?php echo vtranslate('LBL_ROLES_SUBORDINATES','PDFMaker');?>
</option>
                                                                <option value="users"><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_USERS'];?>
</option>
                                                            </select>
                                                            <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
                                                        </td>
                                                        <td width="50">&nbsp;</td>
                                                        <td class="small">&nbsp;</td>
                                                    </tr>
                                                    <tr class="small">
                                                        <td valign=top><?php echo vtranslate('LBL_MEMBER_OF','PDFMaker');?>
 <?php echo vtranslate('LBL_ENTITY','PDFMaker');?>
<br>
                                                            <select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center">
                                                                <input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="PDFMaker_EditJs.sharingAddColumn()" class="crmButton small"/><br /><br />
                                                                <input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="PDFMaker_EditJs.sharingDelColumn()" class="crmButton small"/>
                                                            </div>
                                                        </td>
                                                        <td class="small" style="background-color:#ddFFdd" valign=top><?php echo vtranslate('LBL_MEMBER_OF','PDFMaker');?>
 &quot;<?php echo $_smarty_tpl->tpl_vars['GROUPNAME']->value;?>
&quot; <br>
                                                            <select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
                                                                <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MEMBER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['element']->value[1];?>
</option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" name="sharingSelectedColumnsString" id="sharingSelectedColumnsString" value="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=="professional"){?>
                                    
                                    <tbody id="display_div">
                                        <tr>
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_DISPLAYED','PDFMaker');?>
:</label></td>
                                            <td class="fieldValue" colspan="3">
                                                <select id="displayedValue" name="displayedValue" class="small">
                                                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['PDF_TEMPLATE_RESULT']->value['displayed']!="1"){?>selected<?php }?>><?php echo vtranslate('LBL_YES','PDFMaker');?>
</option>
                                                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['PDF_TEMPLATE_RESULT']->value['displayed']=="1"){?>selected<?php }?>><?php echo vtranslate('LBL_NO','PDFMaker');?>
</option>
                                                </select>
                                                &nbsp;<?php echo vtranslate('LBL_IF','PDFMaker');?>
:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_CONDITIONS','PDFMaker');?>
:</label></td>
                                            <td class="fieldValue" colspan="3">
                                                <input type="hidden" name="display_conditions" id="advanced_filter" value='' />
                                                <div id="advanceFilterContainer" class="conditionsContainer">
                                                    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value), 0);?>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php }?>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="span8">
                

                <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                    <div id="ContentEditorTabs">
                        <ul class="nav nav-tabs massEditTabs" style="margin-bottom: 0;border-bottom: 0;padding-left:5px;">
                            <li id="templateBodyTab" class="divTabs active" data-type="body" onclick="PDFMaker_EditJs.showHideTab3('body');">
                                <a href="#templateBodyTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_BODY','PDFMaker');?>
</strong></a>
                            </li>
                            <li id="headerDivTab" class="divTabs" data-type="header" onclick="PDFMaker_EditJs.showHideTab3('header');">
                                <a href="#templateHeaderTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_HEADER_TAB','PDFMaker');?>
</strong></a>
                            </li>
                            <li id="footerDivTab" class="divTabs" data-type="footer" onclick="PDFMaker_EditJs.showHideTab3('footer');">
                                <a href="#templateFooterTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_FOOTER_TAB','PDFMaker');?>
</strong></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?>
                                <li class="divTabs" onclick="PDFMaker_EditJs.showHideTab3('css_style');">
                                    <a href="#templateCSSStyleTabLayout" data-toggle="tab"><strong><?php echo vtranslate('LBL_CSS_STYLE_TAB','PDFMaker');?>
</strong></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                <?php }?>
                <div class="tab-content layoutContent padding20 themeTableColor overflowVisible" style="position: relative;">
                    
                    <div class="tab-pane active" id="templateBodyTabLayout">
                        <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5"><?php echo $_smarty_tpl->tpl_vars['BODY']->value;?>
</textarea>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                        
                        <div class="tab-pane" id="templateHeaderTabLayout">
                            <textarea name="header_body" id="header_body" style="width:90%;height:200px" class="small"><?php echo $_smarty_tpl->tpl_vars['HEADER']->value;?>
</textarea>
                        </div>
                        
                        <div class="tab-pane" id="templateFooterTabLayout">
                            <textarea name="footer_body" id="footer_body" style="width:90%;height:200px" class="small"><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
</textarea>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?>
                        <div class="tab-pane" id="templateCSSStyleTabLayout">
                            <?php  $_smarty_tpl->tpl_vars['STYLE_DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['STYLE_DATA']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['STYLES_CONTENT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['STYLE_DATA']->key => $_smarty_tpl->tpl_vars['STYLE_DATA']->value){
$_smarty_tpl->tpl_vars['STYLE_DATA']->_loop = true;
?>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="listViewHeaders">
                                        <th>
                                            <div class="pull-left">
                                                <a href="index.php?module=ITS4YouStyles&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['name'];?>
</a>
                                            </div>
                                            <div class="pull-right actions">
                                                <a href="index.php?module=ITS4YouStyles&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank"><i title="<?php echo vtranslate('LBL_SHOW_COMPLETE_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-th-list alignMiddle"></i></a>&nbsp;
                                                <?php if ($_smarty_tpl->tpl_vars['STYLE_DATA']->value['iseditable']=="yes"){?>
                                                    <a href="index.php?module=ITS4YouStyles&view=Edit&record=<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" target="_blank" class="cursorPointer"><i class="icon-pencil alignMiddle" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></a>
                                                <?php }?>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <textarea name="css_style" id="css_style<?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['id'];?>
" style="border: 1px solid black; " class="CodeMirror" tabindex="5"><?php echo $_smarty_tpl->tpl_vars['STYLE_DATA']->value['stylecontent'];?>
</textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            <?php } ?>
                        </div>
                    <?php }?>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            <?php if ($_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value!=''){?> CKEDITOR.config.contentsCss = [<?php echo $_smarty_tpl->tpl_vars['ITS4YOUSTYLE_FILES']->value;?>
];<?php }?>
                            CKEDITOR.replace('body', {height: '1000'});
                            <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
                            CKEDITOR.replace('header_body', {height: '1000'});
                            CKEDITOR.replace('footer_body', {height: '1000'});
                            <?php }?>
                            })
                    </script>
                </div>
            </div>
        </div>




        <div class="contentHeader row-fluid">
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';" ><strong><?php echo vtranslate('LBL_APPLY','PDFMaker');?>
</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" ><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
                <?php if ($_REQUEST['return_view']!=''){?>
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module=<?php if ($_REQUEST['return_module']!=''){?><?php echo $_REQUEST['return_module'];?>
<?php }else{ ?>PDFMaker<?php }?>&view=<?php echo $_REQUEST['return_view'];?>
<?php if ($_REQUEST['templateid']!=''&&$_REQUEST['return_view']!="List"){?>&templateid=<?php echo $_REQUEST['templateid'];?>
<?php }?>';"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }else{ ?>
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                <?php }?>            			
            </span>
        </div>

        <!--<div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate('PDF_MAKER','PDFMaker');?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate('COPYRIGHT','PDFMaker');?>
</div>-->

    </form>
    <div class="popupUi modal hide" data-backdrop="false" style="z-index: 1000006;min-width: 750px;overflow: visible">
        <div class="modal-header contentsBackground">
            <button type="button" class="close closeDiv" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3><?php echo vtranslate('LBL_SET_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="control-label span2"><?php echo vtranslate('LBL_MODULENAMES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</div>
                <div class="controls span9 ">
                    <div class="row-fluid">
                        <select name="filename_fields2" id="filename_fields2" class="form-control row-fluid">
                            <?php if ($_smarty_tpl->tpl_vars['TEMPLATEID']->value==''&&$_smarty_tpl->tpl_vars['SELECTMODULE']->value==''){?>
                                <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
                            <?php }else{ ?>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SELECT_MODULE_FIELD']->value),$_smarty_tpl);?>

                            <?php }?>
                        </select>
                    </div>
                </div>
                <div span="span1">
                    <button type="button" class="btn btn-success InsertIntoTextarea" data-type="filename_fields2" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>$</bold></button>
                </div>
            </div>
            <br>
            <div class="row-fluid">
                <div class="control-label span2"><?php echo vtranslate('LBL_RELATED_MODULES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</div>
                <div class="controls span9 ">
                    <div class="row-fluid">
                        <select name="relatedmodulesorce2" id="relatedmodulesorce2" class="form-control row-fluid"></select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row-fluid">
                <div class="control-label span2">&nbsp;</div>
                <div class="controls span9">
                    <div class="row-fluid">
                        <select name="relatedmodulefields2" id="relatedmodulefields2" class="form-control row-fluid">
                            <option value=""><?php echo vtranslate('LBL_SELECT_MODULE_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
                        </select>
                    </div>
                </div>
                <div span="span1">
                    <button type="button" class="btn btn-success InsertIntoTextarea" data-type="relatedmodulefields2" title="<?php echo vtranslate('LBL_INSERT_TO_TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><bold>$</bold></button>
                </div>
            </div>
            <br>
            <div class="row-fluid fieldValueContainer">
                <textarea data-textarea="true" class="fieldValue row-fluid hide"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class=" pull-right cancelLinkContainer">
                <a class="cancelLink closeModal" type="button"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
            </div>
            <button class="btn btn-success" type="button" name="saveButton"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
        </div>
    </div>
    <div class="clonedPopUp"></div>
</div>
<script type="text/javascript">
    var module_blocks = new Array();
 
    var selected_module = '<?php echo $_smarty_tpl->tpl_vars['SELECTMODULE']->value;?>
';

    var constructedOptionValue;
    var constructedOptionName;
    var roleIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['ROLEIDSTR']->value;?>
);
    var roleNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['ROLENAMESTR']->value;?>
);
    var userIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['USERIDSTR']->value;?>
);
    var userNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['USERNAMESTR']->value;?>
);
    var grpIdArr = new Array(<?php echo $_smarty_tpl->tpl_vars['GROUPIDSTR']->value;?>
);
    var grpNameArr = new Array(<?php echo $_smarty_tpl->tpl_vars['GROUPNAMESTR']->value;?>
);

    <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK']->value!=true){?>
        jQuery(document).ready(function(){
            PDFMaker_EditJs.isLvTmplClicked('init');
            PDFMaker_EditJs.sharing_changed();
        });
    <?php }?>
</script>
<?php }} ?>