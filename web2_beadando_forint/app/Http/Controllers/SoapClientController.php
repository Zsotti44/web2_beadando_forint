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
    public function getTervezok() {
      return response()->json($this->soapClient->getTervezok());
    }
    public function getTKodok() {
      return response()->json($this->soapClient->getTKodok());
    }
    public function getAKodok() {
      return response()->json($this->soapClient->getAKodok());
    }
    public function getAnyagok() {
      return response()->json($this->soapClient->getAnyagok());
    }
    public function getErmekWithAllInfo() {
      return response()->json($this->soapClient->getErmekWithAllInfo());
    }
}
