<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Currency Converter ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTECurrencyConverter_Uninstall_View
 */
class VTECurrencyConverter_Uninstall_View extends Settings_Vtiger_Index_View
{

    /**
     * @param Vtiger_Request $request
     */
    function process(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();
        $moduleLabel = vtranslate($moduleName, $moduleName);

        echo '<div class="container-fluid"><div class="widget_header row-fluid"><h3>' . $moduleLabel . '</h3></div><hr>';

        // Uninstall module
        $module = Vtiger_Module::getInstance($moduleName);

        if ($module) {
            $module->delete();
        }

        // Clean & Clear
        // $this->cleanDatabase($moduleName);
        $this->cleanFolder($moduleName);
        $this->cleanLanguage($moduleName);

        echo "Module was Uninstalled.";
        echo '</div>';
    }

    /**
     * @param $moduleName
     */
    function cleanDatabase($moduleName)
    {
        global $adb;

        // vte_currency_converter table
        echo "&nbsp;&nbsp;- Delete vte_currency_converter table.";
        $result = $adb->pquery("DROP TABLE vte_currency_converter");
        echo ($result) ? " - DONE" : " - <b>ERROR</b>";
        echo '<br>';

    }

    /**
     * @param $moduleName
     */
    function cleanFolder($moduleName)
    {
        echo "&nbsp;&nbsp;- Remove " . $moduleName . " template folder";
        $result = $this->removeFolder('layouts/vlayout/modules/' . $moduleName);
        echo ($result) ? " - DONE" : " - <b>ERROR</b>";
        echo '<br>';

        echo "&nbsp;&nbsp;- Remove " . $moduleName . " template folder";
        $result = $this->removeFolder('layouts/v7/modules/' . $moduleName);
        echo ($result) ? " - DONE" : " - <b>ERROR</b>";
        echo '<br>';

        echo "&nbsp;&nbsp;- Remove " . $moduleName . " module folder";
        $result = $this->removeFolder('modules/' . $moduleName);
        echo ($result) ? " - DONE" : " - <b>ERROR</b>";
        echo '<br>';
    }

    /**
     * @param $path
     * @return bool
     */
    function removeFolder($path)
    {
		if (!isFileAccessible($path) || !is_dir($path)) {
			return false;
		}

        if (!is_writeable($path)) {
            chmod($path, 0777);
        }

        $handle = opendir($path);

        while ($tmp = readdir($handle)) {
            if ($tmp == '..' || $tmp == '.') {
                continue;
            }

            $tmpPath = $path . DS . $tmp;

            if (is_file($tmpPath)) {
                if (!is_writeable($tmpPath)) {
                    chmod($tmpPath, 0666);
                }

                unlink($tmpPath);
            } else if (is_dir($tmpPath)) {
                if (!is_writeable($tmpPath)) {
                    chmod($tmpPath, 0777);
                }

                $this->removeFolder($tmpPath);
            }
        }

        closedir($handle);
        rmdir($path);

        return !is_dir($path);
    }

    /**
     * @param $moduleName
     */
    function cleanLanguage($moduleName) {
        $files = glob("languages/*/{$moduleName}.php"); // get all file names

        foreach($files as $file){ // iterate files
            if(is_file($file)) {
                unlink($file); // delete file
            }
        }
    }

    /**
     * @link http://stackoverflow.com/questions/7288029/php-delete-directory-that-is-not-empty
     * @param $dir
     */
	function rmdir_recursive($dir) {
		foreach(scandir($dir) as $file) {
			if ('.' === $file || '..' === $file) 
				continue;
			
			$tmpFile = "$dir/$file";

			if (is_dir($tmpFile)) 
				$this->rmdir_recursive($tmpFile);
			else 
				unlink($tmpFile);
		}

		rmdir($dir);
	}

}