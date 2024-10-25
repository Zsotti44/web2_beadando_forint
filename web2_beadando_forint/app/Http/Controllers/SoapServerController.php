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
            $server = new Server(null, [
                'uri' => url('/soap')
            ]);
            $server->setClass(SoapService::class);
            $server->handle();
            return response('')->header('Content-Type', 'text/xml');
        } else {
            // Ha GET kérés érkezik, WSDL fájlt kell generálnia
            $autoDiscover = new AutoDiscover();
            $autoDiscover->setClass(SoapService::class);
            $autoDiscover->setUri(url('/soap'));
            
            try {
                $wsdl = $autoDiscover->generate();
                return response($wsdl->toXml())->header('Content-Type', 'text/xml');
            } catch (\Exception $e) {
                return response("Error generating WSDL: " . $e->getMessage(), 500);
            }
        }
    }
}
