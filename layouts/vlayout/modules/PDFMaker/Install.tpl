{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<div class="contentsDiv marginLeftZero">
    <div class="padding1per">
        <br>
        <div class="editContainer" style="padding-left: 3%;padding-right: 3%">
            <h3>{vtranslate('LBL_MODULE_NAME','PDFMaker')} {vtranslate('LBL_INSTALL','PDFMaker')}</h3>
            <hr>
            <div class="clearfix">
            </div>
            <div id="step2" class="padding1per" style="border:1px solid #ccc;">

                <input type="hidden" name="installtype" value="download_src"/>
                <div class="controls">
                    <div>
                        <strong>{vtranslate('LBL_DOWNLOAD_SRC','PDFMaker')}</strong>
                    </div>
                    <br>
                    <div class="clearfix">
                    </div>
                </div>

                <div class="controls">
                    <div>
                        {vtranslate('LBL_DOWNLOAD_SRC_DESC','PDFMaker')}
                        {if $MB_STRING_EXISTS eq 'false'}
                            <br>
                            {vtranslate('LBL_MB_STRING_ERROR','PDFMaker')}
                        {/if}
                    </div>
                    <br>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="controls">
                    <button type="button" id="download_button" class="btn btn-success">
                        <strong>{vtranslate('LBL_DOWNLOAD','PDFMaker')}</strong>
                    </button>&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    jQuery(document).ready(function () {
        PDFMaker_License_Js.registerInstallEvents();
    });
</script>                                   

 				