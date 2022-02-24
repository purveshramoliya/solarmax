{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
<div class='editViewContainer'>
    <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="module" value="PDFMaker">
        <input type="hidden" name="parenttab" value="{$PARENTTAB}">
        <input type="hidden" name="templateid" id="templateid" value="{$SAVETEMPLATEID}">
        {if $DUPLICATE_TEMPLATEID neq ""}<input type="hidden" name="duplicate_templateid" id="duplicate_templateid" value="{$DUPLICATE_TEMPLATEID}">{/if}
        <input type="hidden" name="action" value="SavePDFTemplate">
        <input type="hidden" name="redirect" value="true">
        <input type="hidden" name="return_module" value="{$smarty.request.return_module}">
        <input type="hidden" name="return_view" value="{$smarty.request.return_view}">
        <input type="hidden" name="selectedTab" id="selectedTab" value="basic">
        {assign var="announcement" value=$ANNOUNCEMENT->get('announcement')}
        <input type="hidden" name="announcement_val" id="announcement_val" value="{if !empty($announcement)}1{else}0{/if}">
        <input type="hidden" name="selectedTab2" id="selectedTab2" value="body">
        <div class="contentHeader row-fluid">
            {if $EMODE eq 'edit'}
                {if $DUPLICATE_FILENAME eq ""}
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="{vtranslate('LBL_EDIT','PDFMaker')} &quot;{$FILENAME}&quot;">{vtranslate('LBL_EDIT','PDFMaker')} &quot;{$FILENAME}&quot;</span>
                {else}
                    <span class="span8 font-x-x-large textOverflowEllipsis" title="{vtranslate('LBL_DUPLICATE','PDFMaker')} &quot;{$DUPLICATE_FILENAME}&quot;">{vtranslate('LBL_DUPLICATE','PDFMaker')} &quot;{$DUPLICATE_FILENAME}&quot;</span>
                {/if}
            {else}
                <span class="span8 font-x-x-large textOverflowEllipsis">{vtranslate('LBL_NEW_TEMPLATE','PDFMaker')}</span>
            {/if}
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';"><strong>{vtranslate('LBL_APPLY','PDFMaker')}</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" ><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
                {if $smarty.request.return_view neq ''}
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module={if $smarty.request.return_module neq ''}{$smarty.request.return_module}{else}PDFMaker{/if}&view={$smarty.request.return_view}{if $smarty.request.templateid neq "" && $smarty.request.return_view neq "List"}&templateid={$smarty.request.templateid}{/if}';">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                {else}
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                {/if}         			
            </span>
       </div>
        <div id="edit-template-header_content" class="edit-template-header_content row-fluid">
            <div class="span12" style="z-index:1000;">
                <div class="modal-body tabbable" style="padding:0px;background-color:#ffffff">
                     <ul class="nav nav-tabs massEditTabs" style="margin-bottom:0px; padding-left:5px;">
                         <li id="basic_tab" onclick="PDFMaker_EditJs.showHideTab('basic');" class="active"><a data-toggle="tab" href="#basic_div">{vtranslate('LBL_BASIC_TAB','PDFMaker')}</a></li>
                         <li id="company_tab" onclick="PDFMaker_EditJs.showHideTab('company');"><a data-toggle="tab" href="#company_div">{vtranslate('LBL_OTHER_INFO','PDFMaker')}</a></li>
                         <li id="labels_tab" onclick="PDFMaker_EditJs.showHideTab('labels');"><a data-toggle="tab" href="#labels_div">{vtranslate('LBL_LABELS','PDFMaker')}</a></li>
                         {if $IS_BLOCK neq true}
                             <li id="products_tab" onclick="PDFMaker_EditJs.showHideTab('products');"><a data-toggle="tab" href="#products_div">{vtranslate('LBL_ARTICLE','PDFMaker')}</a></li>
                             <li id="headerfooter_tab" onclick="PDFMaker_EditJs.showHideTab('headerfooter');"><a data-toggle="tab" href="#headerfooter_div">{vtranslate('LBL_HEADER_TAB','PDFMaker')} / {vtranslate('LBL_FOOTER_TAB','PDFMaker')}</a></li>
                             <li id="properties_tab" onclick="PDFMaker_EditJs.showHideTab('properties');"><a data-toggle="tab" href="#properties_div">{vtranslate('LBL_PROPERTIES_TAB','PDFMaker')}</a></li>
                             <li id="settings_tab" onclick="PDFMaker_EditJs.showHideTab('settings');"><a data-toggle="tab" href="#settings_div">{vtranslate('LBL_SETTINGS_TAB','PDFMaker')}</a></li>
                             <li id="sharing_tab" onclick="PDFMaker_EditJs.showHideTab('sharing');"><a data-toggle="tab" href="#sharing_div">{vtranslate('LBL_SHARING_TAB','PDFMaker')}</a></li>
                             {if $TYPE eq "professional"}
                                 <li id="display_tab" onclick="PDFMaker_EditJs.showHideTab('display');" {if $SELECTMODULE eq ""}style="display:none"{/if}><a data-toggle="tab" href="#display_div">{vtranslate('LBL_DISPLAY_TAB','PDFMaker')}</a></li>
                             {/if}
                         {/if}
                     </ul>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="tab-content layoutContent themeTableColor overflowVisible " >
                    <div class="edit-template-content" style="z-index:1000;">
                        {********************************************* PROPERTIES DIV*************************************************}
                        <table class="table table-bordered blockContainer " >
                            <tbody id="basic_div" >
                                {* pdf module name and description *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>{vtranslate('LBL_PDF_NAME','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input name="filename" id="filename" type="text" value="{$FILENAME}" class="detailedViewTextBox span11" tabindex="1"></td>
                                </tr>
                                {if $IS_BLOCK eq true}
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('Type','PDFMaker')}:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            {if $SAVETEMPLATEID neq "" && $TEMPLATEBLOCKTYPE neq ""}
                                                {$TEMPLATEBLOCKTYPE}
                                                <input type="hidden" name="blocktype" id="blocktype" value="{$TEMPLATEBLOCKTYPE}">
                                            {else}
                                                <select name="blocktype" id="blocktype" class="chzn-select span5" data-rule-required="true">
                                                    <option value="header" {if $PDF_TEMPLATE_RESULT.type eq "header"}selected{/if}>{vtranslate('Header',$MODULE)}</option>
                                                    <option value="footer" {if $PDF_TEMPLATE_RESULT.type eq "footer"}selected{/if}>{vtranslate('Footer',$MODULE)}</option>
                                                </select>
                                            {/if}
                                        </td>
                                    </tr>
                                {/if}

                                {* pdf source module and its available fields *}
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px">{if $TEMPLATEID eq "" && $IS_BLOCK neq true}<span class="redColor">*</span>{/if}{vtranslate('LBL_MODULENAMES','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="modulename" id="modulename" class="chzn-select span12">
                                                {if $TEMPLATEID neq "" || $SELECTMODULE neq ""}
                                                    {html_options  options=$MODULENAMES selected=$SELECTMODULE}
                                                {else}
                                                    {html_options  options=$MODULENAMES}
                                                {/if}
                                            </select>
                                        </div><br>
                                        <div class="row-fluid ">
                                            <div class="span10">
                                                <select name="modulefields" id="modulefields" class="chzn-select row-fluid">
                                                    {if $TEMPLATEID eq "" && $SELECTMODULE eq ""}
                                                        <option value="">{vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker')}</option>
                                                    {else}
                                                        {html_options  options=$SELECT_MODULE_FIELD}
                                                    {/if}
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="modulefields"  title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="modulefields" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {* related modules and its fields *}
                                <tr id="body_variables">
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_RELATED_MODULES','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="relatedmodulesorce" id="relatedmodulesorce" class="chzn-select row-fluid">
                                                <option value="">{vtranslate('LBL_SELECT_MODULE','PDFMaker')}</option>
                                                {foreach item=RelMod from=$RELATED_MODULES}
                                                    <option value="{$RelMod.0}" data-module="{$RelMod.3}">{$RelMod.1} ({$RelMod.2})</option>
                                                {/foreach}
                                            </select>                                &nbsp;&nbsp;
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span10">
                                                <select name="relatedmodulefields" id="relatedmodulefields" class="chzn-select row-fluid">
                                                    <option value="">{vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker')}</option>
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="relatedmodulefields" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button><button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="relatedmodulefields" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {if $IS_BLOCK neq true}
                                    {* related bloc tpl *}
                                    <tr id="related_block_tpl_row">
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_RELATED_BLOCK_TPL','PDFMaker')}:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <select name="related_block" id="related_block" class="chzn-select span4" >
                                                {html_options options=$RELATED_BLOCKS}
                                            </select>
                                            <button type="button" class="btn btn-success marginLeftZero" onclick="PDFMaker_EditJs.InsertRelatedBlock();" title="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                            <button type="button" class="btn addButton marginLeftZero" onclick="PDFMaker_EditJs.CreateRelatedBlock();"><i class="icon-plus icon-white"></i>&nbsp;<strong>{vtranslate('LBL_CREATE')}</strong></button>
                                            <button type="button" class="btn marginLeftZero" onclick="PDFMaker_EditJs.EditRelatedBlock();">{vtranslate('LBL_EDIT')}</button>
                                            <button class="btn btn-danger marginLeftZero" class="crmButton small delete" onclick="PDFMaker_EditJs.DeleteRelatedBlock();">{vtranslate('LBL_DELETE')}</button>
                                        </td>
                                    </tr>

                                {else}
                                    {* pdf header variables*}
                                    <tr id="header_variables">
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_HEADER_FOOTER_VARIABLES','PDFMaker')}:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="header_var" id="header_var" class="classname">
                                                {html_options  options=$HEAD_FOOT_VARS selected=""}
                                            </select>
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="header_var" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>

                                        </td>
                                    </tr>
                                {/if}


                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_COMPANY_INFO','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span10">
                                            <select name="acc_info" id="acc_info" class="chzn-select row-fluid">
                                                {html_options  options=$ACCOUNTINFORMATIONS}
                                            </select>
                                        </div>
                                        <div class="btn-group span2">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="acc_info" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                            <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="acc_info" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_SELECT_USER_INFO','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <div class="row-fluid">
                                            <select name="acc_info_type" id="acc_info_type" class="chzn-select span12" onChange="PDFMaker_EditJs.change_acc_info(this)">
                                                {html_options  options=$CUI_BLOCKS}
                                            </select>
                                        </div>
                                        <br>
                                        <div id="user_info_div" class="au_info_div row-fluid" style="display:inline;">
                                            <div class="span10">
                                                <select name="user_info" id="user_info" class="chzn-select row-fluid">
                                                    {html_options  options=$USERINFORMATIONS['a']}
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="user_info" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="user_info" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="logged_user_info_div" class="au_info_div row-fluid" style="display:none;">
                                            <div class="span10">
                                                <select name="logged_user_info" id="logged_user_info" class="chzn-select row-fluid">
                                                    {html_options  options=$USERINFORMATIONS['l']}
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="logged_user_info" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="logged_user_info" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="modifiedby_user_info_div" class="au_info_div row-fluid" style="display:none;">
                                            <div class="span10">
                                                <select name="modifiedby_user_info" id="modifiedby_user_info" class="chzn-select row-fluid">
                                                    {html_options  options=$USERINFORMATIONS['m']}
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="modifiedby_user_info" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="modifiedby_user_info" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                        <div id="smcreator_user_info_div" class="au_info_div row-fluid hide">
                                            <div class="span10">
                                                <select name="smcreator_user_info" id="smcreator_user_info" class="chzn-select row-fluid">
                                                    {html_options  options=$USERINFORMATIONS['c']}
                                                </select>
                                            </div>
                                            <div class="btn-group span2">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero"  data-type="smcreator_user_info" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                                <button type="button" class="btn btn-warning InsertLIntoTemplate" data-type="smcreator_user_info" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT',$MODULE)}"><bold>T</bold></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            {********************************************* Labels *************************************************}
                            <tbody style="display:none;" id="labels_div">
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_GLOBAL_LANG','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="global_lang" id="global_lang" class="chzn-select row-fluid">
                                                {html_options  options=$GLOBAL_LANG_LABELS}
                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-warning InsertIntoTemplate marginLeftZero" data-type="global_lang" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_MODULE_LANG','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="module_lang" id="module_lang" class="chzn-select row-fluid">
                                                {html_options  options=$MODULE_LANG_LABELS}
                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                        <button type="button" class="btn btn-warning InsertIntoTemplate marginLeftZero" data-type="module_lang" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}"><bold>T</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                {if $TYPE eq "professional"}
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_CUSTOM_LABELS','PDFMaker')}:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="custom_lang" id="custom_lang" class="chzn-select row-fluid">
                                                    {html_options  options=$CUSTOM_LANG_LABELS}
                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                                <button type="button" class="btn btn-warning marginLeftZero InsertIntoTemplate" data-type="custom_lang" title="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_LABEL_TO_TEXT','PDFMaker')}"><bold>T</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                {/if}
                            </tbody>
                            {********************************************* Company and User information DIV *************************************************}
                            <tbody style="display:none;" id="company_div">
                                {if $IS_BLOCK neq true}
                                    <tr id="listview_block_tpl_row">
                                        <td class="fieldLabel">
                                            <label class="muted pull-right marginRight10px"><input type="checkbox" name="is_listview" id="isListViewTmpl" {$IS_LISTVIEW_CHECKED} onclick="PDFMaker_EditJs.isLvTmplClicked();" title="{vtranslate('LBL_LISTVIEW_TEMPLATE','PDFMaker')}" />
                                                {vtranslate('LBL_LISTVIEWBLOCK','PDFMaker')}:</label>
                                        </td>
                                        <td class="fieldValue" colspan="3">
                                                    <span>
                                                    <select name="listviewblocktpl" id="listviewblocktpl" class="chzn-select">
                                                        {html_options  options=$LISTVIEW_BLOCK_TPL}
                                                    </select>
                                                    </span>
                                            <button type="button" id="listviewblocktpl_butt" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="listviewblocktpl" title="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </td>
                                    </tr>
                                {/if}

                                {if $MULTICOMPANYINFORMATIONS neq ''}
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{$LBL_MULTICOMPANY}:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="multicomapny" id="multicomapny" class="chzn-select row-fluid">
                                                    {html_options  options=$MULTICOMPANYINFORMATIONS}
                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                                <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="multicomapny" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                {/if}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('TERMS_AND_CONDITIONS','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="invterandcon" id="invterandcon" class="chzn-select row-fluid">
                                                {html_options  options=$INVENTORYTERMSANDCONDITIONS}
                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="invterandcon" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_CURRENT_DATE','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="dateval" id="dateval" class="chzn-select row-fluid">
                                                {html_options  options=$DATE_VARS}
                                            </select>
                                        </div>
                                        <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="dateval" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                {***** BARCODES *****}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_BARCODES','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span10">
                                            <select name="barcodeval" id="barcodeval" class="chzn-select row-fluid">
                                                <optgroup label="{vtranslate('LBL_BARCODES_TYPE1','PDFMaker')}">
                                                    <option value="EAN13">EAN13</option>
                                                    <option value="ISBN">ISBN</option>
                                                    <option value="ISSN">ISSN</option>
                                                </optgroup>

                                                <optgroup label="{vtranslate('LBL_BARCODES_TYPE2','PDFMaker')}">
                                                    <option value="UPCA">UPCA</option>
                                                    <option value="UPCE">UPCE</option>
                                                    <option value="EAN8">EAN8</option>
                                                </optgroup>

                                                <optgroup label="{vtranslate('LBL_BARCODES_TYPE3','PDFMaker')}">
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

                                                <optgroup label="{vtranslate('LBL_BARCODES_TYPE4','PDFMaker')}">
                                                    <option value="IMB">IMB</option>
                                                    <option value="RM4SCC">RM4SCC</option>
                                                    <option value="KIX">KIX</option>
                                                    <option value="POSTNET">POSTNET</option>
                                                    <option value="PLANET">PLANET</option>
                                                </optgroup>

                                                <optgroup label="{vtranslate('LBL_BARCODES_TYPE5','PDFMaker')}">
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

                                                <optgroup label="{vtranslate('LBL_QRCODE','PDFMaker')}">
                                                    <option value="QR">QR</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="btn-group span2">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="barcodeval" alt="{vtranslate('LBL_INSERT_BARCODE_TO_TEXT','PDFMaker')}" title="{vtranslate('LBL_INSERT_BARCODE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>&nbsp;&nbsp;
                                            <a href="index.php?module=PDFMaker&view=IndexAjax&mode=showBarcodes" target="_new"><button type="button" class="btn"><i class="icon-info-sign"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                                {************************************ Custom Functions *******************************************}
                                {if $TYPE eq "professional"}
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('CUSTOM_FUNCTIONS','PDFMaker')}:</label></td>
                                        <td class="fieldValue row-fluid" colspan="3">
                                            <div class="span11">
                                                <select name="customfunction" id="customfunction" class="chzn-select row-fluid">
                                                    {html_options options=$CUSTOM_FUNCTIONS}
                                                </select>
                                            </div>
                                            <div class="btn-group span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="customfunction" title="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                            </div>
                                        </td>
                                    </tr>
                                {/if}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_FONT_AWESOME',$MODULE)}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span10">
                                            <select name="fontawesomeicons" id="fontawesomeicons" class="chzn-select row-fluid">
                                                {foreach item=FONTAWESOMEDATA from=$FONTAWESOMEICONS}
                                                    {if $SELECTEDFONTAWESOMEICON eq ""}{assign var=SELECTEDFONTAWESOMEICON value=$FONTAWESOMEDATA.name}{/if}
                                                    <option value="{$FONTAWESOMEDATA.code}" data-classname="{$FONTAWESOMEDATA.name}" {if $SELECTEDFONTAWESOMEICON eq $FONTAWESOMEDATA.name}selected="selected"{/if}>{$FONTAWESOMEDATA.name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                        <div class="btn-group span2">
                                            <button type="button" class="btn btn-warning InsertIconIntoTemplate" data-type="awesomeicon" title="{vtranslate('LBL_INSERT_TO_TEXT',$MODULE)}"><span id="fontawesomepreview" class="fapreview"></span></button>&nbsp;&nbsp;<a href="index.php?module=PDFMaker&view=IndexAjax&mode=getAwesomeInfoPDF" target="_new"><button type="button" class="btn"><i class="icon-info-sign"></i></button></a>
                                        </div>
                                    </td>
                                </tr>
                                {if vtlib_isModuleActive('ITS4YouSignature')}
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px">
                                            {vtranslate('LBL_IS_SIGNATURE',$MODULE)}:
                                        </label>
                                    </td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span10">
                                            <select name="signaturevalues" id="signaturevalues" class="chzn-select row-fluid">
                                                <option value="PDF_SIGNATURE">{vtranslate('PDF_SIGNATURE',$MODULE)}</option>
                                            </select>
                                        </div>
                                        <div class="btn-group span2">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="signaturevalues" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}">
                                                <bold>$</bold>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {/if}
                            </tbody>
                            {********************************************* Header/Footer *************************************************}
                            <tbody style="display:none;" id="headerfooter_div">
                                {if $IS_BLOCK neq true}
                                    {* pdf format settings *}
                                    {foreach from=$BLOCK_TYPES key=BLOCKID item=BLOCK_TYPE}
                                        <tr id="header_variables">
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px">{$BLOCK_TYPE["name"]}:</label></td>
                                            <td class="fieldValue " colspan="3">
                                                <div class="blocktypeselect row-fluid">
                                                    <select name="blocktype{$BLOCKID}_val" id="blocktype{$BLOCKID}_val" data-type="{$BLOCKID}" class="chzn-select">
                                                        {html_options  options=$BLOCK_TYPE["types"] selected=$BLOCK_TYPE["selected"]}
                                                    </select>
                                                </div>
                                                <div id="blocktype{$BLOCKID}" class="" {if $BLOCK_TYPE["selected"] eq "custom"}style="display:none"{/if}>
                                                    <br>
                                                    <select name="blocktype{$BLOCKID}_list" id="blocktype{$BLOCKID}_list" class="chzn-select row-fluid">
                                                        {foreach  item=BLOCK_TYPE_DATA from=$BLOCK_TYPE["list"]}
                                                            <option value="{$BLOCK_TYPE_DATA["templateid"]}" {if $BLOCK_TYPE_DATA["templateid"] eq $BLOCK_TYPE["selectedid"]}selected{/if}>{$BLOCK_TYPE_DATA["name"]}</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    {/foreach}
                                {/if}
                                {* pdf header variables*}

                                <tr id="header_variables">
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_HEADER_FOOTER_VARIABLES','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="header_var" id="header_var" class="classname">
                                            {html_options  options=$HEAD_FOOT_VARS selected=""}
                                        </select>
                                        <button type="button" class="btn btn-success marginLeftZero InsertIntoTemplate" data-type="header_var" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                    </td>
                                </tr>
                                {* don't display header on first page *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DISPLAY_HEADER','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <b>{vtranslate('LBL_ALL_PAGES','PDFMaker')}</b>&nbsp;<input type="checkbox" id="dh_allid" name="dh_all" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" {$DH_ALL}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_FIRST_PAGE','PDFMaker')}&nbsp;<input type="checkbox" id="dh_firstid" name="dh_first" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" {$DH_FIRST}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_OTHER_PAGES','PDFMaker')}&nbsp;<input type="checkbox" id="dh_otherid" name="dh_other" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'header');" {$DH_OTHER}/>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DISPLAY_FOOTER','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <b>{vtranslate('LBL_ALL_PAGES','PDFMaker')}</b>&nbsp;<input type="checkbox" id="df_allid" name="df_all" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" {$DF_ALL}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_FIRST_PAGE','PDFMaker')}&nbsp;<input type="checkbox" id="df_firstid" name="df_first" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" {$DF_FIRST}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_OTHER_PAGES','PDFMaker')}&nbsp;<input type="checkbox" id="df_otherid" name="df_other" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" {$DF_OTHER}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_LAST_PAGE','PDFMaker')}&nbsp;<input type="checkbox" id="df_lastid" name="df_last" onclick="PDFMaker_EditJs.hf_checkboxes_changed(this, 'footer');" {$DF_LAST}/>
                                        &nbsp;&nbsp;
                                    </td>
                                </tr>
                            </tbody>

                            {*********************************************Products bloc DIV*************************************************}
                            <tbody style="display:none;" id="products_div">
                                {* product bloc tpl which is the same as in main Properties tab*}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_PRODUCT_BLOC_TPL','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="productbloctpl2" id="productbloctpl2" class="classname row-fluid">
                                                {html_options  options=$PRODUCT_BLOC_TPL}
                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="productbloctpl2" title="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}"/><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_ARTICLE','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="articelvar" id="articelvar" class="classname row-fluid">
                                                {html_options  options=$ARTICLE_STRINGS}
                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="articelvar" title="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                {* insert products & services fields into text *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*{vtranslate('LBL_PRODUCTS_AVLBL','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="psfields" id="psfields" class="classname row-fluid">
                                                {html_options  options=$SELECT_PRODUCT_FIELD}
                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="psfields" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                {* products fields *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*{vtranslate('LBL_PRODUCTS_FIELDS','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="productfields" id="productfields" class="classname row-fluid">
                                                {html_options  options=$PRODUCTS_FIELDS}
                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="productfields" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                {* services fields *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">*{vtranslate('LBL_SERVICES_FIELDS','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <div class="span11">
                                            <select name="servicesfields" id="servicesfields" class="classname row-fluid">
                                                {html_options  options=$SERVICES_FIELDS}
                                            </select>
                                        </div>
                                        <div class="span1">
                                            <button type="button" class="btn btn-success InsertIntoTemplate marginLeftZero" data-type="servicesfields" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}" alt="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT','PDFMaker')}"><bold>$</bold></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" colspan="4"><label class="muted marginRight10px"><small>{vtranslate('LBL_PRODUCT_FIELD_INFO','PDFMaker')}</small></label></td>
                                </tr>
                            </tbody>
                            {********************************************* Properties DIV *************************************************}
                            <tbody style="display:none;" id="properties_div">
                                {* pdf format settings *}
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px">{vtranslate('LBL_PDF_FORMAT','PDFMaker')}:</label>
                                    </td>
                                    <td class="fieldValue" colspan="3">
                                        <table style="padding:0px; margin:0px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <select name="pdf_format" id="pdf_format" class="chzn-select" onchange="PDFMaker_EditJs.CustomFormat();">
                                                        {html_options  options=$FORMATS selected=$SELECT_FORMAT}
                                                    </select>
                                                </td>
                                                <td style="padding:0">
                                                    <table class="table showInlineTable" id="custom_format_table" {if $SELECT_FORMAT neq 'Custom'}style="display:none"{/if}>
                                                        <tr>
                                                            <td align="right" nowrap>{vtranslate('LBL_WIDTH','PDFMaker')}</td>
                                                            <td>
                                                                <input type="text" name="pdf_format_width" id="pdf_format_width" class="detailedViewTextBox" value="{$CUSTOM_FORMAT.width}" style="width:50px">
                                                            </td>
                                                            <td align="right" nowrap>{vtranslate('LBL_HEIGHT','PDFMaker')}</td>
                                                            <td>
                                                                <input type="text" name="pdf_format_height" id="pdf_format_height" class="detailedViewTextBox" value="{$CUSTOM_FORMAT.height}" style="width:50px">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                {* pdf orientation settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_PDF_ORIENTATION','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="pdf_orientation" id="pdf_orientation" class="chzn-select">
                                            {html_options  options=$ORIENTATIONS selected=$SELECT_ORIENTATION}
                                        </select>
                                    </td>
                                </tr>
                                {* decimal settings *}
                                {assign var=margin_input_width value='40px'}
                                {assign var=margin_label_width value='40px'}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DECIMALS','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_DEC_POINT','PDFMaker')}</td>
                                                <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="{$DECIMALS.point}" style="width:{$margin_input_width}"/></td>
                                            </tr>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_DEC_DECIMALS','PDFMaker')}</td>
                                                <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="{$DECIMALS.decimals}" style="width:{$margin_input_width}"/></td>
                                            </tr>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_DEC_THOUSANDS','PDFMaker')}</td>
                                                <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="{$DECIMALS.thousands}" style="width:{$margin_input_width}"/></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                {*deafult image size*}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DEFAULT_PRODUCT_IMAGE','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_WIDTH_PX','PDFMaker')}</td>
                                                <td><input type="text" maxlength="3" name="product_image_width" class="detailedViewTextBox" value="{$PDF_TEMPLATE_RESULT.product_image_width}" style="width:{$margin_input_width}"/></td>
                                            </tr>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_HEIGHT_PX','PDFMaker')}</td>
                                                <td><input type="text" maxlength="3" name="product_image_height" class="detailedViewTextBox" value="{$PDF_TEMPLATE_RESULT.product_image_height}" style="width:{$margin_input_width}"/></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                {* signature settings *}
                                <tr>
                                    <td class="fieldLabel">
                                        <label class="muted pull-right marginRight10px">
                                            {vtranslate('LBL_SIGNATURE',$MODULE)}:
                                        </label>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td align="right">{vtranslate('LBL_WIDTH_PX', $MODULE)}</td>
                                                <td>
                                                    <input type="text" class="inputElement" name="signature_width" value="{$SIGNATURE_WIDTH}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">{vtranslate('LBL_HEIGHT_PX', $MODULE)}</td>
                                                <td>
                                                    <input type="text" class="inputElement" name="signature_height" value="{$SIGNATURE_HEIGHT}">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                {* pdf margin settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_MARGINS','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table>
                                            <tr>
                                                <td align="right" nowrap>{vtranslate('LBL_TOP','PDFMaker')}</td>
                                                <td>
                                                    <input type="text" name="margin_top" id="margin_top" class="detailedViewTextBox" value="{$MARGINS.top}" style="width:{$margin_input_width}" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_top', false);">
                                                </td>
                                                <td align="right" nowrap>{vtranslate('LBL_BOTTOM','PDFMaker')}</td>
                                                <td>
                                                    <input type="text" name="margin_bottom" id="margin_bottom" class="detailedViewTextBox" value="{$MARGINS.bottom}" style="width:{$margin_input_width}" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_bottom', false);">
                                                </td>
                                                <td align="right" nowrap>{vtranslate('LBL_LEFT','PDFMaker')}</td>
                                                <td>
                                                    <input type="text" name="margin_left"  id="margin_left" class="detailedViewTextBox" value="{$MARGINS.left}" style="width:{$margin_input_width}" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_left', false);">
                                                </td>
                                                <td align="right" nowrap>{vtranslate('LBL_RIGHT','PDFMaker')}</td>
                                                <td>
                                                    <input type="text" name="margin_right" id="margin_right" class="detailedViewTextBox" value="{$MARGINS.right}" style="width:{$margin_input_width}" onKeyUp="PDFMaker_EditJs.ControlNumber('margin_right', false);">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                {* pdf watemark settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('Watermark','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td align="right" nowrap width="20%">{vtranslate('Type',$MODULE)}</td>
                                                <td>
                                                    <select name="watermark_type" id="watermark_type" class="select2 col-sm-12">
                                                        {html_options options=$WATERMARK.types selected=$WATERMARK.type}
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr id="watermark_image_tr" {if $WATERMARK.type neq "image"}class="hide"{/if}>
                                                <td align="right" nowrap >{vtranslate('Image',$MODULE)}</td>
                                                <td>
                                                    <input type="hidden" name="watermark_img_id" class="inputElement" value="{$WATERMARK.image_id}"/>
                                                    <div id="uploadedWatermarkFileImage" {if $WATERMARK.image_name neq ""}class="hide"{/if}>
                                                        <input type="file" name="watermark_image" class="inputElement"/>
                                                        <div class="uploadedFileDetails">
                                                            <div class="uploadedFileSize"></div>
                                                            <div class="uploadFileSizeLimit redColor">
                                                                {vtranslate('LBL_MAX_UPLOAD_SIZE',$MODULE)}&nbsp;<span class="maxUploadSize" data-value="{$MAX_UPLOAD_LIMIT_BYTES}">{$MAX_UPLOAD_LIMIT_MB}{vtranslate('MB',$MODULE)}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="uploadedWatermarkFileName" {if $WATERMARK.image_name eq ""}class="hide"{/if}>
                                                        <a href="{$WATERMARK.image_url}">{$WATERMARK.image_name}</a>
                                                        <span class="deleteWatermarkFile cursorPointer col-lg-1">
                                                                            <i class="alignMiddle fa fa-trash"></i>
                                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="watermark_text_tr" {if $WATERMARK.type neq "text"}class="hide"{/if}>
                                                <td align="right" nowrap>{vtranslate('Text',$MODULE)}</td>
                                                <td><input type="text" name="watermark_text" class="inputElement getPopupUi" value="{$WATERMARK.text}"/></td>
                                            </tr>
                                            <tr id="watermark_alpha_tr" {if $WATERMARK.type eq "none"}class="hide"{/if}>
                                                <td align="right" nowrap>{vtranslate('Alpha',$MODULE)}</td>
                                                <td><input type="text" name="watermark_alpha" class="inputElement" {if $WATERMARK.alpha eq ""}placeholder="0.1"{/if} value="{$WATERMARK.alpha}"/></td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            {********************************************* Settings DIV *************************************************}
                            <tbody style="display:none;" id="settings_div">
                                {* file name settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_FILENAME','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3">
                                        <input type="text" name="nameOfFile" value="{$NAME_OF_FILE}" id="nameOfFile" class="detailedViewTextBox span11 getPopupUi" />
                                        <div class="span11" style="display: none">
                                            <select name="filename_fields" id="filename_fields" class="chzn-select span6" onchange="PDFMaker_EditJs.insertFieldIntoFilename(this.value);">
                                                <option value="">{vtranslate('LBL_SELECT_MODULE_FIELD','PDFMaker')}</option>
                                                <optgroup label="{vtranslate('LBL_COMMON_FILEINFO','PDFMaker')}">
                                                    {html_options  options=$FILENAME_FIELDS}
                                                </optgroup>
                                                {if $TEMPLATEID neq "" || $SELECTMODULE neq ""}
                                                    {html_options  options=$SELECT_MODULE_FIELD_FILENAME}
                                                {/if}
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" title="{vtranslate('LBL_PDF_PASSWORD','PDFMaker')}"><label class="muted pull-right marginRight10px">{vtranslate('LBL_PDF_PASSWORD','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input type="text" name="PDFPassword" value="{$PDF_PASSWORD}" id="PDFPassword" class="getPopupUi detailedViewTextBox span11"></td>
                                </tr>
                                <tr>
                                    <td class="fieldLabel" title="{vtranslate('LBL_DESCRIPTION','PDFMaker')}"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DESCRIPTION','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3"><input name="description" type="text" value="{$DESCRIPTION}" class="detailedViewTextBox span11" tabindex="2"></td>
                                </tr>

                                {* ignored picklist values settings *}
                                <tr>
                                    <td class="fieldLabel" title="{vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','PDFMaker')}"><label class="muted pull-right marginRight10px">{vtranslate('LBL_IGNORE_PICKLIST_VALUES','PDFMaker')}:</label></td>
                                    <td class="fieldValue row-fluid" colspan="3" title="{vtranslate('LBL_IGNORE_PICKLIST_VALUES_DESC','PDFMaker')}"><input type="text" name="ignore_picklist_values" value="{$IGNORE_PICKLIST_VALUES}" class="detailedViewTextBox"/></td>
                                </tr>


                                {* status settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_STATUS','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <select name="is_active" id="is_active" class="classname" onchange="PDFMaker_EditJs.templateActiveChanged(this);">
                                            {html_options options=$STATUS selected=$IS_ACTIVE}
                                        </select>
                                    </td>
                                </tr>
                                {* is default settings *}
                                <tr>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_SETASDEFAULT','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        {vtranslate('LBL_FOR_DV','PDFMaker')}&nbsp;&nbsp;<input type="checkbox" id="is_default_dv" name="is_default_dv" {$IS_DEFAULT_DV_CHECKED}/>
                                        &nbsp;&nbsp;
                                        {vtranslate('LBL_FOR_LV','PDFMaker')}&nbsp;&nbsp;<input type="checkbox" id="is_default_lv" name="is_default_lv" {$IS_DEFAULT_LV_CHECKED}/>
                                        {* hidden variable for template order settings *}
                                        <input type="hidden" name="tmpl_order" value="{$ORDER}" />
                                    </td>
                                </tr>
                                {* is designated for customerportal *}
                                <tr id="is_portal_row" {if $SELECTMODULE neq "Invoice" && $SELECTMODULE neq "Quotes"}style="display: none;"{/if}>
                                    <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_SETFORPORTAL','PDFMaker')}:</label></td>
                                    <td class="fieldValue" colspan="3">
                                        <input type="checkbox" id="is_portal" name="is_portal" {$IS_PORTAL_CHECKED} onclick="return PDFMaker_EditJs.ConfirmIsPortal(this);"/>
                                    </td>
                                </tr>
                            </tbody>
                            {if $IS_BLOCK neq true}
                                {********************************************* Sharing DIV *************************************************}
                                <tbody style="display:none;" id="sharing_div">
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_TEMPLATE_OWNER','PDFMaker')}:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="template_owner" id="template_owner" class="classname">
                                                {html_options  options=$TEMPLATE_OWNERS selected=$TEMPLATE_OWNER}
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_SHARING_TAB','PDFMaker')}:</label></td>
                                        <td class="fieldValue" colspan="3">
                                            <select name="sharing" id="sharing" class="classname" onchange="PDFMaker_EditJs.sharing_changed();">
                                                {html_options options=$SHARINGTYPES selected=$SHARINGTYPE}
                                            </select>

                                            <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                                                <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
                                                    <tr>
                                                        <td width="40%" valign=top class="cellBottomDotLinePlain small"><strong>{vtranslate('LBL_MEMBER_AVLBL','PDFMaker')}</strong></td>
                                                        <td width="10%">&nbsp;</td>
                                                        <td width="40%" class="cellBottomDotLinePlain small"><strong>{vtranslate('LBL_MEMBER_SELECTED','PDFMaker')}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign=top class="small">
                                                            {vtranslate('LBL_ENTITY','PDFMaker')}:&nbsp;
                                                            <select id="sharingMemberType" name="sharingMemberType" class="small" onchange="PDFMaker_EditJs.showSharingMemberTypes()">
                                                                <option value="groups" selected>{$APP.LBL_GROUPS}</option>
                                                                <option value="roles">{vtranslate('LBL_ROLES','PDFMaker')}</option>
                                                                <option value="rs">{vtranslate('LBL_ROLES_SUBORDINATES','PDFMaker')}</option>
                                                                <option value="users">{$APP.LBL_USERS}</option>
                                                            </select>
                                                            <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
                                                        </td>
                                                        <td width="50">&nbsp;</td>
                                                        <td class="small">&nbsp;</td>
                                                    </tr>
                                                    <tr class="small">
                                                        <td valign=top>{vtranslate('LBL_MEMBER_OF','PDFMaker')} {vtranslate('LBL_ENTITY','PDFMaker')}<br>
                                                            <select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
                                                        </td>
                                                        <td width="50">
                                                            <div align="center">
                                                                <input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="PDFMaker_EditJs.sharingAddColumn()" class="crmButton small"/><br /><br />
                                                                <input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="PDFMaker_EditJs.sharingDelColumn()" class="crmButton small"/>
                                                            </div>
                                                        </td>
                                                        <td class="small" style="background-color:#ddFFdd" valign=top>{vtranslate('LBL_MEMBER_OF','PDFMaker')} &quot;{$GROUPNAME}&quot; <br>
                                                            <select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
                                                                {foreach item=element from=$MEMBER}
                                                                    <option value="{$element.0}">{$element.1}</option>
                                                                {/foreach}
                                                            </select>
                                                            <input type="hidden" name="sharingSelectedColumnsString" id="sharingSelectedColumnsString" value="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                {if $TYPE eq "professional"}
                                    {********************************************* Display DIV *************************************************}
                                    <tbody id="display_div">
                                        <tr>
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DISPLAYED','PDFMaker')}:</label></td>
                                            <td class="fieldValue" colspan="3">
                                                <select id="displayedValue" name="displayedValue" class="small">
                                                        <option value="0" {if $PDF_TEMPLATE_RESULT.displayed neq "1"}selected{/if}>{vtranslate('LBL_YES','PDFMaker')}</option>
                                                        <option value="1" {if $PDF_TEMPLATE_RESULT.displayed eq "1"}selected{/if}>{vtranslate('LBL_NO','PDFMaker')}</option>
                                                </select>
                                                &nbsp;{vtranslate('LBL_IF','PDFMaker')}:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fieldLabel"><label class="muted pull-right marginRight10px">{vtranslate('LBL_CONDITIONS','PDFMaker')}:</label></td>
                                            <td class="fieldValue" colspan="3">
                                                <input type="hidden" name="display_conditions" id="advanced_filter" value='' />
                                                <div id="advanceFilterContainer" class="conditionsContainer">
                                                    {include file='AdvanceFilter.tpl'|@vtemplate_path RECORD_STRUCTURE=$RECORD_STRUCTURE}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                {/if}
                            {/if}
                        </table>
                    </div>
                </div>
            </div>
            <div class="span8">
                {************************************** END OF TABS BLOCK *************************************}

                {if $IS_BLOCK neq true}
                    <div id="ContentEditorTabs">
                        <ul class="nav nav-tabs massEditTabs" style="margin-bottom: 0;border-bottom: 0;padding-left:5px;">
                            <li id="templateBodyTab" class="divTabs active" data-type="body" onclick="PDFMaker_EditJs.showHideTab3('body');">
                                <a href="#templateBodyTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_BODY','PDFMaker')}</strong></a>
                            </li>
                            <li id="headerDivTab" class="divTabs" data-type="header" onclick="PDFMaker_EditJs.showHideTab3('header');">
                                <a href="#templateHeaderTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_HEADER_TAB','PDFMaker')}</strong></a>
                            </li>
                            <li id="footerDivTab" class="divTabs" data-type="footer" onclick="PDFMaker_EditJs.showHideTab3('footer');">
                                <a href="#templateFooterTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_FOOTER_TAB','PDFMaker')}</strong></a>
                            </li>
                            {if $ITS4YOUSTYLE_FILES neq ""}
                                <li class="divTabs" onclick="PDFMaker_EditJs.showHideTab3('css_style');">
                                    <a href="#templateCSSStyleTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_CSS_STYLE_TAB','PDFMaker')}</strong></a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                {/if}
                <div class="tab-content layoutContent padding20 themeTableColor overflowVisible" style="position: relative;">
                    {*********************************************BODY DIV*************************************************}
                    <div class="tab-pane active" id="templateBodyTabLayout">
                        <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5">{$BODY}</textarea>
                    </div>
                    {if $IS_BLOCK neq true}
                        {*********************************************Header DIV*************************************************}
                        <div class="tab-pane" id="templateHeaderTabLayout">
                            <textarea name="header_body" id="header_body" style="width:90%;height:200px" class="small">{$HEADER}</textarea>
                        </div>
                        {*********************************************Footer DIV*************************************************}
                        <div class="tab-pane" id="templateFooterTabLayout">
                            <textarea name="footer_body" id="footer_body" style="width:90%;height:200px" class="small">{$FOOTER}</textarea>
                        </div>
                    {/if}
                    {if $ITS4YOUSTYLE_FILES neq ""}
                        <div class="tab-pane" id="templateCSSStyleTabLayout">
                            {foreach item=STYLE_DATA from=$STYLES_CONTENT}
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="listViewHeaders">
                                        <th>
                                            <div class="pull-left">
                                                <a href="index.php?module=ITS4YouStyles&view=Detail&record={$STYLE_DATA.id}" target="_blank">{$STYLE_DATA.name}</a>
                                            </div>
                                            <div class="pull-right actions">
                                                <a href="index.php?module=ITS4YouStyles&view=Detail&record={$STYLE_DATA.id}" target="_blank"><i title="{vtranslate('LBL_SHOW_COMPLETE_DETAILS', $MODULE)}" class="icon-th-list alignMiddle"></i></a>&nbsp;
                                                {if $STYLE_DATA.iseditable eq "yes"}
                                                    <a href="index.php?module=ITS4YouStyles&view=Edit&record={$STYLE_DATA.id}" target="_blank" class="cursorPointer"><i class="icon-pencil alignMiddle" title="{vtranslate('LBL_EDIT', $MODULE)}"></i></a>
                                                {/if}
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <textarea name="css_style" id="css_style{$STYLE_DATA.id}" style="border: 1px solid black; " class="CodeMirror" tabindex="5">{$STYLE_DATA.stylecontent}</textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            {/foreach}
                        </div>
                    {/if}
                    <div class="hide"><textarea id="fontawesomeclass">{$FONTAWESOMECLASS}</textarea></div>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){ldelim}
                            var stylecontent = jQuery("#fontawesomeclass").val();
                            CKEDITOR.addCss(stylecontent);
                            {if $ITS4YOUSTYLE_FILES neq ""} CKEDITOR.config.contentsCss = [{$ITS4YOUSTYLE_FILES}];{/if}
                            CKEDITOR.replace('body', {ldelim}height: '1000'{rdelim});
                            {if $IS_BLOCK neq true}
                            CKEDITOR.replace('header_body', {ldelim}height: '1000'{rdelim});
                            CKEDITOR.replace('footer_body', {ldelim}height: '1000'{rdelim});
                            {/if}
                            {rdelim})
                    </script>
                </div>
            </div>
        </div>




        <div class="contentHeader row-fluid">
            <span class="pull-right">
                <button class="btn" type="submit" onclick="document.EditView.redirect.value = 'false';" ><strong>{vtranslate('LBL_APPLY','PDFMaker')}</strong></button>&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" ><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
                {if $smarty.request.return_view neq ''}
                    <a class="cancelLink" type="reset" onclick="window.location.href = 'index.php?module={if $smarty.request.return_module neq ''}{$smarty.request.return_module}{else}PDFMaker{/if}&view={$smarty.request.return_view}{if $smarty.request.templateid neq ""  && $smarty.request.return_view neq "List"}&templateid={$smarty.request.templateid}{/if}';">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                {else}
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                {/if}            			
            </span>
        </div>

        <div align="center" class="small" style="color: rgb(153, 153, 153);">{vtranslate('PDF_MAKER','PDFMaker')} {$VERSION} {vtranslate('COPYRIGHT','PDFMaker')}</div>

    </form>
    <div class="popupUi modal hide" data-backdrop="false" style="z-index: 1000006;min-width: 750px;overflow: visible">
        <div class="modal-header contentsBackground">
            <button type="button" class="close closeDiv" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>{vtranslate('LBL_SET_VALUE',$MODULE)}</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="control-label span2">{vtranslate('LBL_MODULENAMES',$MODULE)}:</div>
                <div class="controls span9 ">
                    <div class="row-fluid">
                        <select name="filename_fields2" id="filename_fields2" class="form-control row-fluid">
                            {if $TEMPLATEID eq "" && $SELECTMODULE eq ""}
                                <option value="">{vtranslate('LBL_SELECT_MODULE_FIELD',$MODULE)}</option>
                            {else}
                                {html_options  options=$SELECT_MODULE_FIELD}
                            {/if}
                        </select>
                    </div>
                </div>
                <div span="span1">
                    <button type="button" class="btn btn-success InsertIntoTextarea" data-type="filename_fields2" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT',$MODULE)}"><bold>$</bold></button>
                </div>
            </div>
            <br>
            <div class="row-fluid">
                <div class="control-label span2">{vtranslate('LBL_RELATED_MODULES',$MODULE)}:</div>
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
                            <option value="">{vtranslate('LBL_SELECT_MODULE_FIELD',$MODULE)}</option>
                        </select>
                    </div>
                </div>
                <div span="span1">
                    <button type="button" class="btn btn-success InsertIntoTextarea" data-type="relatedmodulefields2" title="{vtranslate('LBL_INSERT_VARIABLE_TO_TEXT',$MODULE)}"><bold>$</bold></button>
                </div>
            </div>
            <br>
            <div class="row-fluid fieldValueContainer">
                <textarea data-textarea="true" class="fieldValue row-fluid hide"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class=" pull-right cancelLinkContainer">
                <a class="cancelLink closeModal" type="button">{vtranslate('LBL_CANCEL', $MODULE)}</a>
            </div>
            <button class="btn btn-success" type="button" name="saveButton"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
        </div>
    </div>
    <div class="clonedPopUp"></div>
</div>
<script type="text/javascript">
    var module_blocks = new Array();
 
    var selected_module = '{$SELECTMODULE}';

    var constructedOptionValue;
    var constructedOptionName;
    var roleIdArr = new Array({$ROLEIDSTR});
    var roleNameArr = new Array({$ROLENAMESTR});
    var userIdArr = new Array({$USERIDSTR});
    var userNameArr = new Array({$USERNAMESTR});
    var grpIdArr = new Array({$GROUPIDSTR});
    var grpNameArr = new Array({$GROUPNAMESTR});

    {if $IS_BLOCK neq true}
        jQuery(document).ready(function(){ldelim}
            PDFMaker_EditJs.isLvTmplClicked('init');
            PDFMaker_EditJs.sharing_changed();
        {rdelim});
    {/if}
</script>
