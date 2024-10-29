<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\Services\SoapClientService;

class SoapClientController extends Controller
{
    protected $soapClient;

    public function __construct(SoapClientService $soapClient)
    {
        $this->soapClient = $soapClient;
    } 

    public function getErmek() {
        error_log('getErmekben vagyunk');
        $functionName = 'getErmek';
        $parameters = [];

        $response = $this->soapClient->call($functionName,$parameters);
        error_log('response után');
        if ($response !== false) {
            return response()->json(['response' => $response]);
        } else {
            return response()->json(['error' => 'Soap request failed'], 500);
        }
    }
}
