{*<!--
/*********************************************************************************
* The content of this file is subject to the ITS4YouCreator
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
{strip}
    <div id="Settings_{$MODULE_NAME}_Index_View">
        <div class="listViewContentDiv col-lg-12">
            <br>
            <h3>{vtranslate('LBL_MODULE_NAME', $QUALIFIED_MODULE)} {vtranslate('LBL_SETTINGS', $QUALIFIED_MODULE)}</h3>
            <div>{vtranslate('LBL_SETTINGS_DESC', $QUALIFIED_MODULE)}</div>
            <hr>
            <form name="linkModulesForm" id="linkModulesForm" method="POST">
                <table class="table table-bordered equalSplit">
                    {assign var=COUNTER value=0}
                    <tr>
                        {foreach item=MODULE from=$ALL_MODULES}
                        {assign var=MODULE_ID value=$MODULE->id}
                        {assign var=MODULE_NAME value=$MODULE->name}
                        {assign var=MODULE_LABEL value=vtranslate($MODULE->label, $MODULE_NAME)}
                        {assign var=MODULE_ACTIVE value=$CREATOR_FIELDS[$MODULE_ID]['active']}
                        {if $COUNTER eq 2}
                            {assign var=COUNTER value=0}
                            </tr><tr>
                        {/if}
                        <td>
                            <div class="row-fluid moduleManagerBlock">
                                <span class="span1" style="line-height: 2.5;">
                                    <input type="checkbox" class='its4you_creator_checkbox' name="status" data-tabid="{$MODULE_ID}" data-module="{$MODULE_NAME}" {if $MODULE_ACTIVE}checked{/if} />
                                </span>
                                <span class="span5 moduleName">
                                    <h4 style="line-height: 2;">{$MODULE_LABEL}</h4>
                                </span>
                            </div>
                        </td>
                        {assign var=COUNTER value=$COUNTER+1}
                        {/foreach}
                    </tr>
                </table>
            </form>
        </div>
    </div>
{/strip}