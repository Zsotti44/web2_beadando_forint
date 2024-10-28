<?php

namespace App\Services;

use SoapClient;
use Exception;

class SoapClientService
{
    protected $client;

    public function __construct()
    {
        error_log('clientService konstruktor');
        try {
            //$ngrok = 'https://8c1a-2a01-36d-1200-34-e173-ec6f-f200-2137.ngrok-free.app/soap?wsdl';
            $wsdl = config('services.soap.wsdl_url');
            $this->$client = new SoapClient($wsdl, [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ]);

            error_log('siker');
        } catch (Exception $e) {
            error_log('nem siker');
            error_log('hiba a kliens létrehozásakor: ' . $e->getMessage());
        }
        
    }

    /**
     * Példa egy függvény hívására a SOAP szerveren keresztül.
     *
     * @param string $name
     * @return string
     */
    public function call($function, $params = [])
    {
        if (!$this->client) {
            \Log::error("SOAP client is not initialized.");
            return false;
        }

        try {
            return $this->client->__soapCall($function, [$params]);
        } catch(Exception $e) {
            \Log::error("SOAP Request Error in $function: " . $e->getMessage());
            return false;
        }
    }
}
