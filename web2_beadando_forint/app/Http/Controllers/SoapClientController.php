<?php

namespace App\Http\Controllers;


use App\Services\SoapClientService;

class SoapClientController extends Controller
{
    protected SoapClientService $soapClient;
    public function __construct(SoapClientService $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    public function index()
    {
        return view("SOAPclient.index");
    }

    public function getErmek() {
      return response()->json($this->soapClient->getAllErme());
    }
}
