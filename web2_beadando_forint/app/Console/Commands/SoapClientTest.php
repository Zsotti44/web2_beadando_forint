<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SoapClient;
use Exception;

class SoapClientTest extends Command
{
    protected $signature = 'soap:test';
    protected $description = 'Teszteli a SoapClient inicializálását Laravelben';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $options = [
            'trace' => true,
            'exceptions' => true,
        ];

        $client = new SoapClient(storage_path('/soap.wsdl'), $options);
        error_log("SOAP client inicializálva");

        try {
            $functionName = 'getErmek';
            $params = [];

            $response = $client->__soapCall($functionName, $params);
            error_log($client->__getLastRequest());
            error_log($client->__getLastResponse());
            error_log(json_encode($response));
            //error_log("SOAP válasz a getErme hívásra: " . print_r($response, true));

        } catch (SoapFault $e) {
            error_log("SOAP Request Error: " . $e->getMessage());
        }

        return 0;
    }
}
