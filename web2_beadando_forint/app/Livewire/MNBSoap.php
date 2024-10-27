<?php

namespace App\Livewire;

use App\Services\MNBService;
use Livewire\Component;
use Carbon\Carbon;

class MNBSoap extends Component
{
    public $currency;
    public $date;
    public $year;
    public $month;
    public $dailyRate = [];
    public $monthlyRates = [];
    public $availableCurrencies;

    public function mount(MNBService $service)
    {
        $this->date = Carbon::now()->format('Y-m-d');
        $availableCurrencies = $response = $service->call('GetCurrencies');
        $xml = new \SimpleXMLElement($availableCurrencies->GetCurrenciesResult);

        foreach ($xml->Currencies->Curr as $currency) {
            $this->availableCurrencies[] = (string) $currency;
        }

    }

    // Napi árfolyam lekérdezése

    public function getDailyRate(MNBService $service)
    {
        $params = [
            'startDate' => $this->date,
            'endDate' => $this->date,
            'currencyNames' => $this->currency,
        ];

        try {
            $response = $service->call('GetExchangeRates', [$params]);
            $xml = simplexml_load_string($response->GetExchangeRatesResult);
            $this->dailyRate = (string)$xml->Day->Rate;
        } catch (\Exception $e) {
            $this->dailyRate = 'Hiba: ' . $e->getMessage();
        }
    }

    // Havi árfolyam lekérdezése
    public function getMonthlyRates(MNBService $service)
    {

        $startDate = Carbon::create($this->year, $this->month, 1)->format('Y-m-d');
        $endDate = Carbon::create($this->year, $this->month, 1)->endOfMonth()->format('Y-m-d');

        $params = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => $this->currency,
        ];

        try {
            $response = $service->call('GetExchangeRates', [$params]);
            $xml = simplexml_load_string($response->GetExchangeRatesResult);

            $this->monthlyRates = [];
            foreach ($xml->Day as $day) {
                $this->monthlyRates[] = [
                    'date' => (string)$day['date'],
                    'rate' => (string)$day->Rate,
                ];
            }
        } catch (\Exception $e) {
            $this->monthlyRates = [['error' => 'Hiba: ' . $e->getMessage()]];
        }
    }

    public function render()
    {
        return view('livewire.mnbsoap');
    }
}
