<?php

namespace App\Services;

use Carbon\Carbon;

class MNBService
{
    protected $client;
    public function __construct()
    {
        // Itt add meg a WSDL URL-t
        $wsdl = 'https://www.mnb.hu/arfolyamok.asmx?wsdl';
        $this->client = new \SoapClient($wsdl);
    }
    public function call($functionName, $parameters = [])
    {
        try {
            return $this->client->__soapCall($functionName, $parameters);
        } catch (\SoapFault $e) {
            return 'SOAP Error: ' . $e->getMessage();
        }
    }

    public function GetAllCurrencies()
    {
        $response = $this->call('GetCurrencies');
        $xml = new \SimpleXMLElement($response->GetCurrenciesResult);
        $temp = [];
        foreach ($xml->Currencies->Curr as $currency) {
            $temp[] = (string) $currency;
        }
        return $temp;
    }
    public function getDailyRate($date,$currency)
    {
        $params = [
            'startDate' => $date,
            'endDate' => $date,
            'currencyNames' => $currency,
        ];
        $temp = '';

        try {
            $response = $this->call('GetExchangeRates', [$params]);
            $xml = simplexml_load_string($response->GetExchangeRatesResult);
            $temp = (string)$xml->Day->Rate;
        } catch (\Exception $e) {
            $temp = 'Hiba: ' . $e->getMessage();
        }
        return $temp;
    }

    // Havi árfolyam lekérdezése
    public function getMonthlyRates($currency,$year,$month)
    {

        $startDate = Carbon::create($year, $month, 1)->format('Y-m-d');
        $endDate = Carbon::create($year, $month, 1)->endOfMonth()->format('Y-m-d');

        $params = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => $currency,
        ];

        try {
            $response = $this->call('GetExchangeRates', [$params]);
            $xml = simplexml_load_string($response->GetExchangeRatesResult);

            $temp = [];
            foreach ($xml->Day as $day) {
                $temp[] = [
                    'date' => (string)$day['date'],
                    'rate' => (string)$day->Rate,
                ];
            }
        } catch (\Exception $e) {
            $temp = [['error' => 'Hiba: ' . $e->getMessage()]];
        }
        return $temp;
    }

}
