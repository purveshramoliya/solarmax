{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
<div style="position: relative;">
    <table class="table table-bordered equalSplit detailview-table">
        <thead>
            <tr>
                <th class="blockHeader" colspan="2">{vtranslate('LBL_TEMPLATE_INFORMATIONS','PDFMaker')}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fieldLabel narrowWidthType" style="width:25%;"><label class="muted pull-right marginRight10px">{vtranslate('LBL_PDF_NAME','PDFMaker')}</label></td>
                <td class="fieldValue narrowWidthType" style="width:75%;">{$FILENAME}</td>
            </tr>
            <tr>
                <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px">{vtranslate('LBL_DESCRIPTION','PDFMaker')}</label></td>
                <td class="fieldValue narrowWidthType" valign=top>{$DESCRIPTION}</td>
            </tr>
            <tr>
                <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px">{vtranslate('LBL_MODULENAMES','PDFMaker')}</label></td>
                <td class="fieldValue narrowWidthType" valign=top>{$MODULENAME}</td>
            </tr>
            {if $IS_BLOCK eq false}
                <tr>
                    <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px">{vtranslate('Status')}</label></td>
                    <td class="fieldValue narrowWidthType" valign=top>{$IS_ACTIVE}</td>
                </tr>
                <tr>
                    <td class="fieldLabel narrowWidthType"><label class="muted pull-right marginRight10px">{vtranslate('LBL_SETASDEFAULT','PDFMaker')}</label></td>
                    <td class="fieldValue narrowWidthType" valign=top>{$IS_DEFAULT}</td>
                </tr>
            {/if}
        </tbody>
    </table>
    {if $IS_BLOCK eq false}
        <div class="row-fluid paddingTop20">
            <div class="span12">
                    <strong>{vtranslate('LBL_PDF_TEMPLATE','PDFMaker')}</strong>
            </div>
        </div>
        <br>
        <ul class="nav nav-tabs massEditTabs" style="margin-bottom: 0;border-bottom: 0">
            <li id="assignedToRoleTab" class="active">
                <a href="#templateBodyTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_BODY','PDFMaker')}</strong></a>
            </li>
            <li class="">
                <a href="#templateHeaderTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_HEADER_TAB','PDFMaker')}</strong></a>
            </li>
            <li id="assignedToRoleTab">
                <a href="#templateFooterTabLayout" data-toggle="tab"><strong>{vtranslate('LBL_FOOTER_TAB','PDFMaker')}</strong></a>
            </li>
        </ul>
    {/if}
    <div class="tab-content layoutContent padding20 themeTableColor overflowVisible" style="position: relative;">
        <div class="tab-pane active" id="templateBodyTabLayout">
            <div class="row-fluid">
                <div id="previewcontent_body" class="hide">{$BODY}</div>           
                <iframe id="preview_body" class="row-fluid" style="height:1200px;"></iframe>
            </div>  
        </div>
        {if $IS_BLOCK eq false}
            <div class="tab-pane" id="templateHeaderTabLayout">
                <div class="row-fluid">
                    <div id="previewcontent_header" class="hide">{$HEADER}</div>
                    <iframe id="preview_header" class="row-fluid" style="height:500px;"></iframe>
                </div>
            </div>
            <div class="tab-pane" id="templateFooterTabLayout">
                <div class="row-fluid">
                    <div id="previewcontent_footer" class="hide">{$FOOTER}</div>
                    <iframe id="preview_footer" class="row-fluid" style="height:500px;"></iframe>
                </div>
            </div>
        {/if}
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {ldelim}
        PDFMaker_Detail_Js.setPreviewContent('body');
        {if $IS_BLOCK eq false}
            PDFMaker_Detail_Js.setPreviewContent('header');
            PDFMaker_Detail_Js.setPreviewContent('footer');
        {/if}
    {rdelim});
    </script>        
</div>
