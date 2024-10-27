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
    public $dailyRate;
    public $monthlyRates = [];
    public $availableCurrencies = [];

    public function mount(MNBService $service)
    {
        $this->date = Carbon::now()->format('Y-m-d');
        $this->availableCurrencies = $service->GetAllCurrencies();
    }


    public function getDailyRate(MNBService $service)
    {
    return $this->dailyRate = $service->GetDailyRate($this->date, $this->currency);
    }

    public function getMonthlyRates(MNBService $service)
    {
    return $this->monthlyRates = $service->GetMonthlyRates($this->currency,$this->year,$this->month);
    }

    public function render()
    {
        return view('livewire.mnbsoap');
    }
}
