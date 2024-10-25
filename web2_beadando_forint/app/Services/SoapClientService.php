<?php

namespace App\Services;

use SoapClient;

class SoapClientService
{
    protected $client;

    public function __construct()
    {
        // SOAP kliens inicializálása a WSDL URL alapján
        $wsdl = config('services.soap.wsdl_url'); // Célszerű a WSDL URL-t a konfigurációs fájlokban megadni
        $this->client = new SoapClient($wsdl, [
            'trace' => true,     // Nyomkövetés a hibakereséshez
            'cache_wsdl' => WSDL_CACHE_NONE, // WSDL cache kikapcsolása fejlesztéshez
        ]);
    }

    /**
     * Példa egy függvény hívására a SOAP szerveren keresztül.
     *
     * @param string $name
     * @return string
     */
    public function sayHello($name)
    {
        return $this->client->sayHello($name);
    }
}
