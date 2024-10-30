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
            'location' => 'http://127.0.0.1:8000/soap',
            'uri' => 'http://127.0.0.1:8000/soap',
            'trace' => true,
            'exceptions' => true,
        ];
        
        $client = new SoapClient(null, $options);
    
        try {
            $functionName = 'getErmek';
            $params = []; 
            
            $response = $client->__soapCall($functionName, $params);
            error_log(json_encode($response));
            //error_log("SOAP válasz a getErme hívásra: " . print_r($response, true));
    
        } catch (SoapFault $e) {
            error_log("SOAP Request Error: " . $e->getMessage());
        }

        return 0;
    }
}
