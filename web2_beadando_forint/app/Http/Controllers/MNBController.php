<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MNBService;
use Illuminate\Support\Facades\Cache;

class MNBController extends Controller
{
    protected $mnbService;

    public function __construct(MNBService $mnbService)
    {
        $this->mnbService = $mnbService;
    }

    /**
     * MNB adatszolgáltatás menüpont
     */
    public function index()
    {
        return view('MNB.index');
    }
    public function tecbdemo()
    {
        return view('MNB.techdemo');
    }
    /**
     * MNB wsdl lekérés GET végponton szükség esetére
     */
    public function getWsdl()
    {
        return $this->mnbService->getWsdl();
    }

    /**
     * Elérhető devizanemek listája
     */
    public function getAllCurrencies()
    {
        return $this->mnbService->getAllCurrencies();
    }

    /**
     * Adott napi árfolyam meghatározott devizára
     */
    public function getDailyRate(Request $request)
    {
        $date = $request->json('date');
        $currency = $request->json('currency');

        if (!$date || !$currency) {
            return response()->json(['error' => 'date and currency parameters are mandatory'], 400);
        }

        error_log('controller getDailyRate');
        $response = $this->mnbService->getDailyRate($date, $currency);
        return response()->json([ 'rate' => $response]);
    }

    /**
     * Adott havi árfolyam meghatározott devizára
     */
    public function getMonthlyRates(Request $request)
    {
        $currency = $request->json('currency');
        $year = $request->json('year');
        $month = $request->json('month');

        //error_log('év: ' . $year . ' honap: ' . $month . ' dev: ' . $currency);
        if (!$year || !$currency || !$month) {
            return response()->json(['error' => 'year, month and currency parameters are mandatory'], 400);
        }

        return $this->mnbService->getMonthlyRates($currency,$year,$month);
    }

    /**
     * Devizapár árfolyam számítás meghatározott devizákra, dátumra
     */
    public function getCurrencyPair(Request $request)
    {
        $date = $request->json('date');
        $currency1 = $request->json('currency1');
        $currency2 = $request->json('currency2');
        //error_log('datum: ' . $date . ' dev1: ' . $currency1 . ' dev2: ' . $currency2);

        //Forintot nem kell lekérni az 1
        $currencyRate1 = $currency1 != "HUF" ? $this->mnbService->getDailyRate($date, $currency1) : 1;
        $currencyRate2 = $currency2 != "HUF" ? $this->mnbService->getDailyRate($date, $currency2) : 1;

        $currencyRate1 = str_replace(',','.',$currencyRate1);
        $currencyRate2 = str_replace(',','.',$currencyRate2);

        $curr1ToCurr2Rate = round(floatval($currencyRate1) / floatval($currencyRate2),4);
        $curr2ToCurr1Rate = round(floatval($currencyRate2) / floatval($currencyRate1),4);

        $response = [ 'rate1' => str_replace('.',',',(string)$curr1ToCurr2Rate), 'rate2' => str_replace('.',',',(string)$curr2ToCurr1Rate)];
        error_log('valasz json: ' . json_encode($response));
        return response()->json([ 'rate1' => str_replace('.',',',(string)$curr1ToCurr2Rate), 'rate2' => str_replace('.',',',(string)$curr2ToCurr1Rate)]);
    }

    /**
     * Napi árfolyamok menüpont
     */
    public function exchangeRate()
    {
        $devizak = Cache::get('available_currencies');
        if (!$devizak)
        {
            $devizak = $this->getAllCurrencies();
            Cache::put('available_currencies', $devizak, 3600);
        }

        return view('MNB.napiArfolyam', compact('devizak'));
    }

    /**
     * Havi napi árfolyamok
     */
    public function monthlyExchangeRate()
    {
        $devizak = Cache::get('available_currencies');
        if (!$devizak)
        {
            $devizak = $this->getAllCurrencies();
            Cache::put('available_currencies', $devizak, 3600);
        }

        return view('MNB.haviArfolyam', compact('devizak'));
    }

    /**
     * Devizapárok megjelenítése
     */
    public function showCurrencyPair()
    {
        $devizak = Cache::get('available_currencies');
        if (!$devizak)
        {
            $devizak = $this->getAllCurrencies();
            Cache::put('available_currencies', $devizak, 3600);
        }

        return view('MNB.devizapar', compact('devizak'));
    }

}
