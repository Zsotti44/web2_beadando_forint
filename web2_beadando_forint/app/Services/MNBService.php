<?php

namespace App\Services;

use Carbon\Carbon;

class MNBService
{
    protected $client;
    protected $wsdl;

    public function __construct()
    {
        $this->wsdl = config('services.mnb.mnb_wsdl_url');
        $this->client = new \SoapClient($this->wsdl);
    }

    public function call($functionName, $parameters = [])
    {
        try {
            return $this->client->__soapCall($functionName, $parameters);
        } catch (\SoapFault $e) {
            return 'SOAP Error: ' . $e->getMessage();
        }
    }

    public function getWsdl()
    {
        $response = file_get_contents($this->wsdl);
        //error_log("wsdl: " . print_r($response, true));
        return $response;
    }

    public function getAllCurrencies()
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

    public function getMonthlyRates($currencies, $year, $month)
    {
        $startDate = Carbon::create($year, $month, 1)->format('Y-m-d');
        $endDate = Carbon::create($year, $month, 1)->endOfMonth()->format('Y-m-d');

        $params = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => implode(',', $currencies), // Tömb átalakítása stringgé
        ];

        try {
            $response = $this->call('GetExchangeRates', [$params]);
            $xml = simplexml_load_string($response->GetExchangeRatesResult);

            // Ellenőrizzük, hogy a $xml valóban tömb-e
            if ($xml === false) {
                error_log('XML Parsing Error: ' . print_r(libxml_get_errors(), true));
                return []; // Visszaadunk egy üres tömböt hiba esetén
            }

            $temp = [];
            foreach ($xml->Day as $day) {
                $date = (string)$day['date']; // Kivesszük a dátumot a ciklus elején
                $temp[$date] = []; // Inicializáljuk a dátumot

                foreach ($day->Rate as $rateElement) {
                    $currency = (string)$rateElement['curr'];
                    $rateValue = (string)$rateElement;

                    // Hozzáadjuk az árfolyamot a dátumhoz
                    $temp[$date][$currency] = $rateValue;
                }
            }

        } catch (\Exception $e) {
            error_log('Hiba: ' . $e->getMessage());
            return []; // Visszaadunk egy üres tömböt hiba esetén
        }

        return $temp; // Visszaadjuk az árfolyamok tömbjét
    }




}
