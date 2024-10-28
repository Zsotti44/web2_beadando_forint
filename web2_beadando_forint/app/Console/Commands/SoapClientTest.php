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
        try {
            // SOAP kliens inicializálása
            $client = new SoapClient('http://127.0.0.1:8000/soap?wsdl', [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ]);

            $this->info("SOAP Client successfully initialized.");
        } catch (Exception $e) {
            $this->error("SOAP Client Initialization Error: " . $e->getMessage());
        }

        return 0;
    }
}
