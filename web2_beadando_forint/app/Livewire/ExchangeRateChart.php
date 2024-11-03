<?php

namespace App\Livewire;

use App\Services\MNBService;
use Livewire\Component;
use Illuminate\Support\Facades\Livewire;
use function Laravel\Prompts\error;

class ExchangeRateChart extends Component
{
    public MNBService $service;
    public $devizak = [];
    public $currencies;
    public $year;
    public $month;
    public $rates = [];
    public function mount(MNBService $service){
        $this->devizak = $service->GetAllCurrencies();
    }
    public function getRates(MNBService $service)
    {
        $this->rates = [];
        $this->rates = $service->getMonthlyRates($this->currencies, $this->year, $this->month);
        $this->dispatch('ratesUpdated', $this->rates);
    }



    public function render()
    {
        return view('livewire.exchange-rate-chart');
    }
}
