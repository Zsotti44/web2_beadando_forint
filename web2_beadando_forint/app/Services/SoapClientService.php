<?php

namespace App\Services;

use SoapClient;
use Exception;

class SoapClientService
{
    protected $client;

    public function __construct()
    {
        libxml_disable_entity_loader(false);
        error_log('clientService konstruktor');
        try {
            //$ngrok = 'https://8c1a-2a01-36d-1200-34-e173-ec6f-f200-2137.ngrok-free.app/soap?wsdl';
            //$wsdl = config('services.soap.wsdl_url');
            $this->client = new SoapClient(null, [
                'uri' => 'http://127.0.0.1:8000/soap',
                'location' => 'http://127.0.0.1:8000/soap',
                'trace' => true,
                'exceptions' => true,
                'soap_version'=> SOAP_1_1,
            ]);  
            if (!$this->client) {
                error_log('nincs client');
                return false;
            } else {
                error_log('siker');
            }
            
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
            error_log('call kezd');
            return $this->client->__soapCall($function, [$params]);
            error_log('call vege');
        } catch(Exception $e) {
            error_log('call catch: ' . $e->getMessage());
            error_log("SOAP Last Request Headers: " . $this->client->__getLastRequestHeaders());
            error_log("SOAP Last Request: " . $this->client->__getLastRequest());
            error_log("SOAP Last Response: " . $this->client->__getLastResponse());

            \Log::error("SOAP Request Error in $function: " . $e->getMessage());
            return false;
        }
    }
}
