{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
{if $DIR eq 'asc'}
    {assign var="dir_img" value='<img src="layouts/vlayout/skins/images/upArrowSmall.png" border="0" />'}
{else}
    {assign var="dir_img" value='<img src="layouts/vlayout/skins/images/downArrowSmall.png" border="0" />'}
{/if}

{assign var="name_dir" value="asc"}
{assign var="module_dir" value="asc"}
{assign var="description_dir" value="asc"}
{assign var="order_dir" value="asc"}
{assign var="sharingtype_dir" value="asc"}

{if $ORDERBY eq 'filename' && $DIR eq 'asc'}
    {assign var="name_dir" value="desc"}
{elseif $ORDERBY eq 'module' && $DIR eq 'asc'}
    {assign var="module_dir" value="desc"}
{elseif $ORDERBY eq 'description' && $DIR eq 'asc'}
    {assign var="description_dir" value="desc"}
{elseif $ORDERBY eq 'order' && $DIR eq 'asc'}
    {assign var="order_dir" value="desc"}
{elseif $ORDERBY eq 'sharingtype' && $DIR eq 'asc'}
    {assign var="sharingtype_dir" value="desc"}     
{/if}
<div class="listViewEntriesDiv">
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="table table-bordered listViewEntriesTable">
            <thead>
                <tr class="listViewHeaders">
                    <th width="2%" class="narrowWidthType">#</th>
                    <th width="3%" class="narrowWidthType">{vtranslate("LBL_LIST_SELECT","PDFMaker")}</th>
                    {if $VIEW eq 'ListBlocks'}
                        <th width="15%" class="narrowWidthType">{vtranslate("LBL_PDF_NAME","PDFMaker")}</th>
                        <th width="15%" class="narrowWidthType">{vtranslate("LBL_MODULENAMES","PDFMaker")}</th>
                        <th width="34%" class="narrowWidthType">{vtranslate("LBL_DESCRIPTION","PDFMaker")}</th>
                        <th width="34%" class="narrowWidthType">{vtranslate("LBL_BLOCK","PDFMaker")}</th>
                    {else}
                        <th width="15%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=name&dir={$name_dir}">{vtranslate("LBL_PDF_NAME","PDFMaker")}{if $ORDERBY eq 'filename'}{$dir_img}{/if}</a></th>
                        <th width="15%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=module&dir={$module_dir}">{vtranslate("LBL_MODULENAMES","PDFMaker")}{if $ORDERBY eq 'module'}{$dir_img}{/if}</a></th>
                        <th width="34%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=description&dir={$description_dir}">{vtranslate("LBL_DESCRIPTION","PDFMaker")}{if $ORDERBY eq 'description'}{$dir_img}{/if}</a></th>
                        <th width="5%" class="narrowWidthType"><a href="index.php?module=PDFMaker&view=List&orderby=sharingtype&dir={$sharingtype_dir}">{vtranslate("LBL_SHARING_TAB","PDFMaker")}{if $ORDERBY eq 'sharingtype'}{$dir_img}{/if}</a></th>
                        <th width="5%" class="narrowWidthType" nowrap>{vtranslate("LBL_TEMPLATE_OWNER","PDFMaker")}</th>
                        {if $VERSION_TYPE neq 'deactivate'}<th width="5%" class="narrowWidthType">{vtranslate("Status")}</th>{/if}
                    {/if}
                    <th width="11%" class="narrowWidthType">{vtranslate("LBL_ACTION","PDFMaker")}</th>
                </tr>
            </thead>
            {if $VIEW neq 'ListBlocks'}
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="listSearchContributor" name="search_filename" value="{$SEARCHFILENAMEVAL}"></td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_module">
                            <option value=""></option>
                            {html_options  options=$SEARCHSELECTBOXDATA.modules selected=$SEARCHMODULEVAL}
                        </select>
                    </td>
                    <td><input type="text" class="listSearchContributor" name="search_description" value="{$SEARCHDESCRIPTIONVAL}"></td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_sharingtype">
                            {html_options  options=$SHARINGTYPES selected=$SEARCHSHARINGTYPEVAL}
                        </select>
                    </td>
                    <td>
                        <select class="chzn-select listSearchContributor" name="search_owner">
                            <option value=""></option>
                            {html_options  options=$SEARCHSELECTBOXDATA.owners selected=$SEARCHOWNERVAL}
                        </select>
                    </td>
                    <td>
                        <select class="chzn-select span2 listSearchContributor" name="search_status">
                            <option value=""></option>
                            {html_options  options=$STATUSOPTIONS selected=$SEARCHSTATUSVAL}
                        </select>
                    </td>
                    <td>
                        <button class="btn" data-trigger="listSearch">{vtranslate('LBL_SEARCH',"PDFMaker")}</button>
                    </td>
                </tr>
            {/if}
            <tbody>
            {foreach item=template name=mailmerge from=$PDFTEMPLATES}
                <tr class="listViewEntries" {if $template.status eq 0} style="font-style:italic;" {/if} data-id="{$template.templateid}" data-recordurl="index.php?module=PDFMaker&view=Detail&templateid={$template.templateid}" id="PDFMaker_listView_row_{$template.templateid}">
                    <td class="narrowWidthType" valign=top>{$smarty.foreach.mailmerge.iteration}</td>
                    <td class="narrowWidthType" valign=top><input type="checkbox" class=small name="selected_id" value="{$template.templateid}"></td>
                    <td class="narrowWidthType" valign=top>{$template.filename}</td>
                    <td class="narrowWidthType" valign=top {if $template.status eq 0} style="color:#888;" {/if}>{$template.module}</a></td>
                    <td class="narrowWidthType" valign=top {if $template.status eq 0} style="color:#888;" {/if}>{$template.description}&nbsp;</td>
                    {if $VIEW eq 'ListBlocks'}
                        <td class="narrowWidthType" valign=top style="color:#888;">{$template.type}&nbsp;</td>
                    {else}
                        <td class="narrowWidthType" valign=top {if $template.status eq 0} style="color:#888;" {/if}>{$template.sharing}&nbsp;</td>
                        <td class="narrowWidthType" valign=top {if $template.status eq 0} style="color:#888;" {/if} nowrap>{$template.owner}&nbsp;</td>
                        {if $VERSION_TYPE neq 'deactivate'}<td class="narrowWidthType" valign=top {if $template.status eq 0} style="color:#888;" {/if}>{$template.status_lbl}&nbsp;</td>{/if}
                    {/if}
                    <td class="narrowWidthType" valign=top nowrap>{$template.edit}</td>
                </tr>
            {foreachelse}
                <tr>
                    <td style="background-color:#efefef;" align="center" colspan="9">
                        <table class="emptyRecordsDiv">
                            <tbody>
                                <tr>
                                    <td>
                                        {if $VIEW eq 'ListBlocks'}
                                            {assign var="LABEL" value="LBL_BLOCK"}
                                            {assign var="ADDTOURL" value="&mode=Blocks"}
                                        {else}
                                            {assign var="LABEL" value="LBL_TEMPLATE"}
                                            {assign var="ADDTOURL" value=""}
                                        {/if}
                                        {vtranslate("LBL_NO")} {vtranslate($LABEL,"PDFMaker")} {vtranslate("LBL_FOUND","PDFMaker")}<br><br>
                                        <a href="index.php?module=PDFMaker&view=Edit{$ADDTOURL}">{vtranslate("LBL_CREATE_NEW")} {vtranslate($LABEL,"PDFMaker")}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
</div>
<br>
<div align="center" class="small" style="color: rgb(153, 153, 153);">{vtranslate("PDF_MAKER","PDFMaker")} {$VERSION} {vtranslate("COPYRIGHT","PDFMaker")}</div>