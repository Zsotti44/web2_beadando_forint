<?php

namespace App\Livewire;

use App\Services\MNBService;
use Livewire\Component;
use Illuminate\Support\Facades\Livewire;
class ExchangeRateChart extends Component
{
    public MNBService $service;
    public $devizak = [];
    public $currency;
    public $year;
    public $month;
    public $rates = [];
    public function mount(MNBService $service){
        $this->devizak = $service->GetAllCurrencies();
    }
    public function getRates(MNBService $service)
    {
        error_log('GetRatesMeghívva');
        if ($this->currency && $this->year && $this->month) {
            $this->rates = $service->GetMonthlyRates($this->currency, $this->year, $this->month);
            $this->dispatch('ratesUpdated', $this->rates);
        }
    }
    public function render()
    {
        return view('livewire.exchange-rate-chart');
    }
}
