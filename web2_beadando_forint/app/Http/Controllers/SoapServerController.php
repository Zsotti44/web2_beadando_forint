<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laminas\Soap\Server;
use Laminas\Soap\AutoDiscover;
use App\Services\SoapService;

class SoapServerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $server = new Server(url('/soap.wsdl'), [
                'uri' => 'http://localhost:8080',
            ]);
            $server->setClass(SoapService::class);
            $server->handle();

            return response()->header('Content-Type', 'text/xml');
        } else {
            // Ha GET kérés érkezik, WSDL fájlt kell generálnia
            $autoDiscover = new AutoDiscover();
            $autoDiscover->setClass(SoapService::class)
                         ->setUri(url('/soap'))
                         ->setBindingStyle([
                            'style' => 'document',
                            'transport' => 'http://schemas.xmlsoap.org/soap/http', // SOAP 1.1-hez szükséges URI
                        ]);

            try {
                $wsdl = $autoDiscover->generate();
                $wsdlXml = $wsdl->toXml();
                //file_put_contents(storage_path('soap.wsdl'), $wsdlXml);

                return response($wsdlXml)->header('Content-Type', 'text/xml');
            } catch (\Exception $e) {
                return response("Error generating WSDL: " . $e->getMessage(), 500);
            }
        }
    }
}
