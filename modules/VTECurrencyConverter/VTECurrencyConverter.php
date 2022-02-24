<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Currency Converter ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTECurrencyConverter
 */
class VTECurrencyConverter
{

    function vtlib_handler($modulename, $event_type)
    {
        if ($event_type == 'module.postinstall') {
            // Handle actions when this module is install.
            self::addWidgetTo($modulename);
        } else if ($event_type == 'module.disabled') {
            // Handle actions when this module is disabled.
            self::removeWidgetTo($modulename);
        } else if ($event_type == 'module.enabled') {
            // Handle actions when this module is enabled.
            self::addWidgetTo($modulename);
        } else if ($event_type == 'module.preuninstall') {
            // Handle actions when this module is about to be deleted.
        } else if ($event_type == 'module.preupdate') {
            // Handle actions before this module is updated.
        } else if ($event_type == 'module.postupdate') {
            // Handle actions when this module is update.
            self::removeWidgetTo($modulename);
            self::addWidgetTo($modulename);
        }
    }

    static function addWidgetTo($moduleName)
    {
        global  $adb, $vtiger_current_version;
        $module = Vtiger_Module::getInstance($moduleName);
        $widgetName = 'VTECurrencyConverter';
        if(version_compare($vtiger_current_version, '7.0.0', '<')) {
            $template_folder= "layouts/vlayout";
        }else{
            $template_folder= "layouts/v7";
        }
        // remove module from menu.
        $idModule = $module->getId();
        $adb->pquery("UPDATE `vtiger_app2tab` SET `appname`='' WHERE (`tabid`=?)", array($idModule));
        $adb->pquery("UPDATE `vtiger_tab` SET `parent`='' WHERE (`tabid`=?)", array($idModule));
        ///
        if ($module) {
            $css_widgetType = 'HEADERCSS';
            $css_widgetLabel = vtranslate($widgetName, $moduleName);
            $css_link = $template_folder."/modules/{$moduleName}/resources/{$moduleName}CSS.css";

            $js_widgetType = 'HEADERSCRIPT';
            $js_widgetLabel = vtranslate($widgetName, $moduleName);
            $js_link = $template_folder."/modules/{$moduleName}/resources/{$moduleName}JS.js";

            // css
            $module->addLink($css_widgetType, $css_widgetLabel, $css_link);
            // js
            $module->addLink($js_widgetType, $js_widgetLabel, $js_link);
        }
    }

    static function removeWidgetTo($moduleName)
    {
        global  $vtiger_current_version;
        $module = Vtiger_Module::getInstance($moduleName);
        $widgetName = 'VTECurrencyConverter';
        if(version_compare($vtiger_current_version, '7.0.0', '<')) {
            $template_folder= "layouts/vlayout";
        }else{
            $template_folder= "layouts/v7";
        }

        if ($module) {
            $css_widgetType = 'HEADERCSS';
            $css_widgetLabel = vtranslate($widgetName, $moduleName);
            $css_link = $template_folder."/modules/{$moduleName}/resources/{$moduleName}CSS.css";

            $js_widgetType = 'HEADERSCRIPT';
            $js_widgetLabel = vtranslate($widgetName, $moduleName);
            $js_link = $template_folder."/modules/{$moduleName}/resources/{$moduleName}JS.js";

            // css
            $module->deleteLink($css_widgetType, $css_widgetLabel, $css_link);
            // js
            $module->deleteLink($js_widgetType, $js_widgetLabel, $js_link);
        }
    }

}
