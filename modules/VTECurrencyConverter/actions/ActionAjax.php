<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Currency Converter ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTECurrencyConverter_ActionAjax_Action
 */
class VTECurrencyConverter_ActionAjax_Action extends Vtiger_Action_Controller
{
    public static $API_GOOGLE_CONVERTER = 'https://finance.google.com/finance/converter';

    /**
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->exposeMethod('gForm');
        $this->exposeMethod('gConvert');
    }

    /**
     * @param Vtiger_Request $request
     * @return bool
     */
    public function checkPermission(Vtiger_Request $request)
    {
        return;
    }

    /**
     * @param Vtiger_Request $request
     */
    public function process(Vtiger_Request $request)
    {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    /**
     * @param Vtiger_Request $request
     */
    public function gForm(Vtiger_Request $request)
    {
        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);
        $data = array();

        $form = file_get_contents("https://finance.google.com/finance/converter");
        $data['content'] = base64_encode($form);

        $response->setResult($data);
        return $response->emit();
    }

    public function gConvert(Vtiger_Request $request)
    {
        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);
        $data = array();

        $api = self::$API_GOOGLE_CONVERTER;
        $amount = urlencode($request->get('a'));
        $from = urlencode($request->get('from'));
        $to = urlencode($request->get('to'));
        $meta = urlencode($request->get('meta'));
        $form = file_get_contents("{$api}?a={$amount}&from={$from}&to={$to}&meta={$meta}");
        $get = explode("<span class=bld>", $form);
        $get = explode("</span>", $get[1]);
        $convertedAmount = preg_replace("/[^0-9\.]/", null, $get[0]);

        $data['content'] = base64_encode($form);
        $data['result'] = $convertedAmount;

        $response->setResult($data);
        return $response->emit();
    }

}