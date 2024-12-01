<?php

namespace App\Services;

use SoapClient;
use Exception;

class SoapClientService
{
    protected $client;

    public function __construct()
    {
        ini_set('default_socket_timeout', 20);
        try {
            $this->client = new SoapClient(url('/soap?wsdl'), [
                    'trace' => true,
                    'exceptions' => true,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                'keep_alive' => true,
            ]);

        } catch (Exception $e) {
            error_log('SoapClientService::__construct(): ' . $e->getMessage());
        }

    }
    public function getErmek()
    {
        $response = $this->call('getErmek');
        return $response;
    }
    public function getAnyagok() {
        return $this->call('getAnyagok');
    }
    public function getTervezok()
    {
        return $this->call('getTervezok');
    }
    public function getTKodok(){
        return $this->call('getTKodok');
    }

    public function getAKodok(){
        return $this->call('getAKodok');
    }

    public function getErmekWithAllInfo()
    {
        return $this->call('getErmekWithAllInfo');
    }

    public function call($function, $params = [])
    {
        if (!$this->client) {

            return "SOAP client is not initialized.";
        }

        try {
            return $this->client->__soapCall($function, [$params]);
        } catch(Exception $e) {
            return "SOAP Request Error in $function: " . $e->getMessage();
        }
    }
}
