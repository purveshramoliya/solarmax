<?php /* Smarty version Smarty-3.1.7, created on 2019-04-11 10:08:57
         compiled from "/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFTemplatesContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2464731565caf1239125e46-60141396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6a24fc9872483d7855371feb54bfbd21d726a76' => 
    array (
      0 => '/home4/kalpdeep/public_html/mps/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFTemplatesContents.tpl',
      1 => 1554976898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2464731565caf1239125e46-60141396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DIR' => 0,
    'ORDERBY' => 0,
    'VIEW' => 0,
    'name_dir' => 0,
    'dir_img' => 0,
    'module_dir' => 0,
    'description_dir' => 0,
    'sharingtype_dir' => 0,
    'VERSION_TYPE' => 0,
    'SEARCHFILENAMEVAL' => 0,
    'SEARCHSELECTBOXDATA' => 0,
    'SEARCHMODULEVAL' => 0,
    'SEARCHDESCRIPTIONVAL' => 0,
    'SHARINGTYPES' => 0,
    'SEARCHSHARINGTYPEVAL' => 0,
    'SEARCHOWNERVAL' => 0,
    'STATUSOPTIONS' => 0,
    'SEARCHSTATUSVAL' => 0,
    'PDFTEMPLATES' => 0,
    'template' => 0,
    'LABEL' => 0,
    'ADDTOURL' => 0,
    'VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5caf12393200a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5caf12393200a')) {function content_5caf12393200a($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home4/kalpdeep/public_html/mps/libraries/Smarty/libs/plugins/function.html_options.php';
?>
<?php if ($_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["dir_img"] = new Smarty_variable('<img src="layouts/vlayout/skins/images/upArrowSmall.png" border="0" />', null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars["dir_img"] = new Smarty_variable('<img src="layouts/vlayout/skins/images/downArrowSmall.png" border="0" />', null, 0);?>
<?php }?>

<?php $_smarty_tpl->tpl_vars["name_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["module_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["description_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["order_dir"] = new Smarty_variable("asc", null, 0);?>
<?php $_smarty_tpl->tpl_vars["sharingtype_dir"] = new Smarty_variable("asc", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='filename'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["name_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='module'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["module_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='description'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["description_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='order'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["order_dir"] = new Smarty_variable("desc", null, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['ORDERBY']->value=='sharingtype'&&$_smarty_tpl->tpl_vars['DIR']->value=='asc'){?>
    <?php $_smarty_tpl->tpl_vars["sharingtype_dir"] = new Smarty_variable("desc", null, 0);?>     
<?php }?>
<div class="listViewEntriesDiv">
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="table table-bordered listViewEntriesTable">
            <thead>
                <tr class="listViewHeaders">
                    <th width="2%" class="narrowWidthType">#</th>
                    <th width="3%" class="narrowWidthType"><?php echo vtranslate("LBL_LIST_SELECT","PDFMaker");?>
</th>
                    <?php if ($_smarty_tpl->tpl_vars['VIEW']->value=='ListBlocks'){?>
                        <th width="15%" class="narrowWidthType"><?php echo vtranslate("LBL_PDF_NAME","PDFMaker");?>
</th>
                        <th width="15%" class="narrowWidthType"><?php echo vtranslate("LBL_MODULENAMES","PDFMaker");?>
</th>
                        <th width="34%" class="narrowWidthType"><?php echo vtranslate("LBL_DESCRIPTION","PDFMaker");?>
</th>
                        <th width="34%" class="narrowWidthType"><?php echo vtranslate("LBL_BLOCK","PDFMaker");?>
</th>
                    <?php }else{ ?>
                        <th width="15%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=name&dir=<?php echo $_smarty_tpl->tpl_vars['name_dir']->value;?>
"><?php echo vtranslate("LBL_PDF_NAME","PDFMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='filename'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                        <th width="15%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=module&dir=<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
"><?php echo vtranslate("LBL_MODULENAMES","PDFMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='module'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                        <th width="34%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=description&dir=<?php echo $_smarty_tpl->tpl_vars['description_dir']->value;?>
"><?php echo vtranslate("LBL_DESCRIPTION","PDFMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='description'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                        <th width="5%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=sharingtype&dir=<?php echo $_smarty_tpl->tpl_vars['sharingtype_dir']->value;?>
"><?php echo vtranslate("LBL_SHARING_TAB","PDFMaker");?>
<?php if ($_smarty_tpl->tpl_vars['ORDERBY']->value=='sharingtype'){?><?php echo $_smarty_tpl->tpl_vars['dir_img']->value;?>
<?php }?></a></th>
                        <th width="5%" class="narrowWidthType" nowrap><?php echo vtranslate("LBL_TEMPLATE_OWNER","PDFMaker");?>
</th>
                        <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!='deactivate'){?><th width="5%" class="narrowWidthType"><?php echo vtranslate("Status");?>
</th><?php }?>
                    <?php }?>
                    <th width="11%" class="narrowWidthType"><?php echo vtranslate("LBL_ACTION","PDFMaker");?>
</th>
                </tr>
            </thead>
            <?php if ($_smarty_tpl->tpl_vars['VIEW']->value!='ListBlocks'){?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="listSearchContributor" name="search_filename" value="<?php echo $_smarty_tpl->tpl_vars['SEARCHFILENAMEVAL']->value;?>
"></td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_module">
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SEARCHSELECTBOXDATA']->value['modules'],'selected'=>$_smarty_tpl->tpl_vars['SEARCHMODULEVAL']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                    <td><input type="text" class="listSearchContributor" name="search_description" value="<?php echo $_smarty_tpl->tpl_vars['SEARCHDESCRIPTIONVAL']->value;?>
"></td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_sharingtype">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SHARINGTYPES']->value,'selected'=>$_smarty_tpl->tpl_vars['SEARCHSHARINGTYPEVAL']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                    <td>
                        <select class="chzn-select listSearchContributor" name="search_owner">
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['SEARCHSELECTBOXDATA']->value['owners'],'selected'=>$_smarty_tpl->tpl_vars['SEARCHOWNERVAL']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_status">
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['STATUSOPTIONS']->value,'selected'=>$_smarty_tpl->tpl_vars['SEARCHSTATUSVAL']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                    <td>
                        <button class="btn" data-trigger="listSearch"><?php echo vtranslate('LBL_SEARCH',"PDFMaker");?>
</button>
                    </td>
                </tr>
            <?php }?>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['template'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['template']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PDFTEMPLATES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mailmerge']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['template']->key => $_smarty_tpl->tpl_vars['template']->value){
$_smarty_tpl->tpl_vars['template']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mailmerge']['iteration']++;
?>
                <tr class="listViewEntries" <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="font-style:italic;" <?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" data-recordurl="index.php?module=PDFMaker&view=Detail&templateid=<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
" id="PDFMaker_listView_row_<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
">
                    <td class="narrowWidthType" valign=top><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['mailmerge']['iteration'];?>
</td>
                    <td class="narrowWidthType" valign=top><input type="checkbox" class=small name="selected_id" value="<?php echo $_smarty_tpl->tpl_vars['template']->value['templateid'];?>
"></td>
                    <td class="narrowWidthType" valign=top><?php echo $_smarty_tpl->tpl_vars['template']->value['filename'];?>
</td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['module'];?>
</a></td>
                    <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['description'];?>
&nbsp;</td>
                    <?php if ($_smarty_tpl->tpl_vars['VIEW']->value=='ListBlocks'){?>
                        <td class="narrowWidthType" valign=top style="color:#888;"><?php echo $_smarty_tpl->tpl_vars['template']->value['type'];?>
&nbsp;</td>
                    <?php }else{ ?>
                        <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['sharing'];?>
&nbsp;</td>
                        <td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?> nowrap><?php echo $_smarty_tpl->tpl_vars['template']->value['owner'];?>
&nbsp;</td>
                        <?php if ($_smarty_tpl->tpl_vars['VERSION_TYPE']->value!='deactivate'){?><td class="narrowWidthType" valign=top <?php if ($_smarty_tpl->tpl_vars['template']->value['status']==0){?> style="color:#888;" <?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value['status_lbl'];?>
&nbsp;</td><?php }?>
                    <?php }?>
                    <td class="narrowWidthType" valign=top nowrap><?php echo $_smarty_tpl->tpl_vars['template']->value['edit'];?>
</td>
                </tr>
            <?php }
if (!$_smarty_tpl->tpl_vars['template']->_loop) {
?>
                <tr>
                    <td style="background-color:#efefef;" align="center" colspan="9">
                        <table class="emptyRecordsDiv">
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['VIEW']->value=='ListBlocks'){?>
                                            <?php $_smarty_tpl->tpl_vars["LABEL"] = new Smarty_variable("LBL_BLOCK", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["ADDTOURL"] = new Smarty_variable("&mode=Blocks", null, 0);?>
                                        <?php }else{ ?>
                                            <?php $_smarty_tpl->tpl_vars["LABEL"] = new Smarty_variable("LBL_TEMPLATE", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars["ADDTOURL"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <?php echo vtranslate("LBL_NO");?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['LABEL']->value,"PDFMaker");?>
 <?php echo vtranslate("LBL_FOUND","PDFMaker");?>
<br><br>
                                        <a href="index.php?module=PDFMaker&view=Edit<?php echo $_smarty_tpl->tpl_vars['ADDTOURL']->value;?>
"><?php echo vtranslate("LBL_CREATE_NEW");?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['LABEL']->value,"PDFMaker");?>
</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div>
<br>
<!--<div align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo vtranslate("PDF_MAKER","PDFMaker");?>
 <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 <?php echo vtranslate("COPYRIGHT","PDFMaker");?>
</div>--><?php }} ?>