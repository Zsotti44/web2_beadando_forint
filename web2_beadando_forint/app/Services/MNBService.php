<?php

namespace App\Services;

class MNBService
{
    protected $client;
    public function __construct()
    {
        // Itt add meg a WSDL URL-t
        $wsdl = 'https://www.mnb.hu/arfolyamok.asmx?wsdl';
        $this->client = new \SoapClient($wsdl);
    }
    public function call($functionName, $parameters = [])
    {
        try {
            // Hívja meg a SOAP funkciót
            return $this->client->__soapCall($functionName, $parameters);
        } catch (\SoapFault $e) {
            // Hibakezelés
            return 'SOAP Error: ' . $e->getMessage();
        }
    }
}
