{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
<script>
    function ExportTemplates()
    {ldelim}
        window.location.href = "index.php?module=PDFMaker&action=ExportPDFTemplate&templates={$TEMPLATEID}";
    {rdelim}
</script>        
<div class="detailViewContainer">
    <div class="row-fluid detailViewTitle">
        <div class="row-fluid">
            <div class="span7">
                <div class="row-fluid">
                    <span class="span2"></span>
                    <span class="span8 margin0px">
                        <span class="row-fluid">
                            <span class="recordLabel font-x-x-large textOverflowEllipsis pushDown span" title="{$FILENAME}">
                                <span class="templatename">{$FILENAME}</span>
                            </span>
                        </span>
                        <span class="row-fluid">
                            <span class="modulename_label">{vtranslate('LBL_MODULENAMES','PDFMaker')}:</span>
                            &nbsp;{$MODULENAME}
                        </span>
                    </span>
                </div>
            </div>
            <div class="span5">
                <div class="pull-right detailViewButtoncontainer">
                    <div class="btn-toolbar">
                        {if $EDIT eq 'permitted'}
                            <span class="btn-group">
                              <button class="btn" id="PDFMaker_detailView_basicAction_LBL_EDIT" onclick="window.location.href = 'index.php?module={$MODULE}&view=Edit&templateid={$TEMPLATEID}&return_view=Detail';
    return false;"><strong>{vtranslate('LBL_EDIT')}</strong></button>
                            </span>
                            <span class="btn-group">
                                <button class="btn" id="PDFMaker_detailView_basicAction_LBL_DUPLICATE" onclick="window.location.href = 'index.php?module={$MODULE}&view=Edit&templateid={$TEMPLATEID}&isDuplicate=true&return_view=Detail';
    return false;"><strong>{vtranslate('LBL_DUPLICATE')}</strong></button>
                            </span>
                        {/if}
                        {if $DELETE eq 'permitted'}
                            <span class="btn-group">
                                <button class="btn" id="PDFMaker_detailView_basicAction_Delete" onclick="deleteRecord('index.php?module=PDFMaker&action=DeletePDFTemplate&templateid={$TEMPLATEID}'); return false;" style="font-weight:bold" ><strong>{vtranslate('LBL_DELETE')}</strong></button>
                            </span>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detailViewInfo row-fluid">
        <div class="{if $IS_BLOCK eq false}span10 details{/if}">
            <form id="detailView" method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();">  
                <div class="contents">
                    <input type="hidden" name="action" value="">
                    <input type="hidden" name="view" value="">
                    <input type="hidden" name="module" value="PDFMaker">
                    <input type="hidden" name="retur_module" value="PDFMaker">
                    <input type="hidden" name="return_action" value="PDFMaker">
                    <input type="hidden" name="return_view" value="Detail">
                    <input type="hidden" name="templateid" value="{$TEMPLATEID}">
                    <input type="hidden" name="parenttab" value="{$PARENTTAB}">
                    <input type="hidden" name="isDuplicate" value="false">
                    <input type="hidden" name="subjectChanged" value="">
                    <input id="recordId" value="{$TEMPLATEID}" type="hidden">