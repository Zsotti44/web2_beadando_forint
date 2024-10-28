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

    /* public function getErmek(Request $request) {

        try {
            error_log('kliens');
            //$wsdlUrl = config('services.soap.wsdl_url');
            //error_log('itt a wsdl: ' . $wsdlUrl);
            //$client = new SoapClient($wsdlUrl);

            $wsdlUrl = storage_path('soap.wsdl');
            $client = new \SoapClient($wsdlUrl, [
                'trace' => true,           // Kérések és válaszok naplózása
                'keep_alive' => false,
                'connection_timeout' => 5000,
                'exceptions' => true,       // Kivétel dobása hiba esetén
                'cache_wsdl' => WSDL_CACHE_NONE, // WSDL cache kikapcsolása fejlesztéshez

            ]);

            error_log('client után');

            try {
                $response = $client->getErmek();
                error_log("getErmek response: " . print_r($response, true));
                return response()->json($response);
            } catch (\Exception $e) {
                error_log("Error during getErmek call: " . $e->getMessage());
            
                // Nyers kérés és válasz naplózása a hibakereséshez
                error_log("Last SOAP request: " . $client->__getLastRequest());
                error_log("Last SOAP response: " . $client->__getLastResponse());
                return response()->json("Hibás még mindig: ");
            }
            //$response = $client->__soapCall('getErmek', []);

            
        } catch (\SoapFault $e) {
            error_log('Soap hiba: ' . $e->getMessage());
        }
        
    } */
}
