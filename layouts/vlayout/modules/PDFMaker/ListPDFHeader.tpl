{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
<div class="listViewTopMenuDiv">
    <div class="listViewActionsDiv row-fluid">
        <span class="btn-toolbar span4">
            <span class="btn-group listViewMassActions">
                    {if count($LISTVIEW_MASSACTIONS) gt 0 || $LISTVIEW_LINKS['LISTVIEW']|@count gt 0}
                            <button class="btn dropdown-toggle" data-toggle="dropdown"><strong>{vtranslate('LBL_ACTIONS', $MODULE)}</strong>&nbsp;&nbsp;<i class="caret"></i></button>
                            <ul class="dropdown-menu">
                                    {if count($LISTVIEW_MASSACTIONS) gt 0}
                                        {foreach item="LISTVIEW_MASSACTION" from=$LISTVIEW_MASSACTIONS}
                                                <li id="{$MODULE}_listView_massAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($LISTVIEW_MASSACTION->getLabel())}"><a href="javascript:void(0);" {if stripos($LISTVIEW_MASSACTION->getUrl(), 'javascript:')===0}onclick='{$LISTVIEW_MASSACTION->getUrl()|substr:strlen("javascript:")};'{else} onclick="Vtiger_List_Js.triggerMassAction('{$LISTVIEW_MASSACTION->getUrl()}')"{/if} >{vtranslate($LISTVIEW_MASSACTION->getLabel(), $MODULE)}</a></li>
                                        {/foreach}
                                        
                                        {if $LISTVIEW_LINKS['LISTVIEW']|@count gt 0}<li class="divider"></li> {/if}
                                    {/if}
                                    
                                    {if $LISTVIEW_LINKS['LISTVIEW']|@count gt 0}
                                            {foreach item=LISTVIEW_ADVANCEDACTIONS from=$LISTVIEW_LINKS['LISTVIEW']}
                                                    <li id="{$MODULE}_listView_advancedAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($LISTVIEW_ADVANCEDACTIONS->getLabel())}"><a {if stripos($LISTVIEW_ADVANCEDACTIONS->getUrl(), 'javascript:')===0} href="javascript:void(0);" onclick='{$LISTVIEW_ADVANCEDACTIONS->getUrl()|substr:strlen("javascript:")};'{else} href='{$LISTVIEW_ADVANCEDACTIONS->getUrl()}' {/if}>{vtranslate($LISTVIEW_ADVANCEDACTIONS->getLabel(), $MODULE)}</a></li>
                                            {/foreach}
                                    {/if}
                            </ul>
                    {/if}
            </span>
            {if $EDIT eq 'permitted'}
                <span class="btn-group"><button class="btn addButton" type="submit" onclick="this.form.view.value = 'Edit';this.form.mode.value = '';"><i class="icon-plus icon-white"></i>&nbsp;<strong>{vtranslate("LBL_ADD_TEMPLATE","PDFMaker")}</strong></button></span>
                <span class="btn-group"><button class="btn addButton" type="submit" onclick="this.form.view.value = 'Edit';this.form.mode.value = 'Blocks';"><i class="icon-plus icon-white"></i>&nbsp;<strong>{vtranslate("LBL_ADD_BLOCK","PDFMaker")}</strong></button></span>
            {/if}
            <span class="btn-group"><button class="btn saveButton" onclick="window.location.href = 'http://www.its4you.sk/images/pdf_maker/pdf_maker_for_vtiger6_crm.pdf'; return false;">{vtranslate("PDFMakerManual","PDFMaker")}</button></span>
        </span>
        <span class="btn-toolbar span4">
            <span class="customFilterMainSpan btn-group">
            </span>
        </span>
        <span class="hide filterActionImages pull-right">
                <i title="{vtranslate('LBL_DENY', $MODULE)}" data-value="deny" class="icon-ban-circle alignMiddle denyFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_APPROVE', $MODULE)}" data-value="approve" class="icon-ok alignMiddle approveFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_DELETE', $MODULE)}" data-value="delete" class="icon-trash alignMiddle deleteFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_EDIT', $MODULE)}" data-value="edit" class="icon-pencil alignMiddle editFilter filterActionImage pull-right"></i>
        </span>
        <span class="span4 btn-toolbar">
                {include file='ListPDFActions.tpl'|@vtemplate_path:'PDFMaker'}
        </span>
    </div>
</div>