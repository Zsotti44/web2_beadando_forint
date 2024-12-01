<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\RestClientController;
use App\Models\Erme;
use Illuminate\Http\Request;

class RestClient extends Component
{

    public $ermek = [];
    public $selectedErme = null;
    public $form = [
        'ermeid' => null,
        'cimlet' => 0,
        'tomeg' => 0.0,
        'darab' => 0,
        'kiadas' => null,
        'bevonas' => null,
    ];
    public $url;
    public $action = 'modosit';
    

    public function mount($ermek = [])
    {
        $this->ermek = $ermek;
    }

    public function fetchErmek()
    {
        $restController = new RestClientController();
        $response = $restController->getErmek();
        $this->mount($response);
    }

    public function selectErme($erme = null)
    {
        if ($erme === null) {
            $this->selectedErme = [
                'ermeid' => null,
                'cimlet' => null,
                'tomeg' => null,
                'darab' => null,
                'kiadas' => null,
                'bevonas' => null
            ];
        } else {
            $this->selectedErme = $erme;
        }
    }

    public function setAction($action) {
        $this->action = $action;

        if ($action === "rogzites") {
            $this ->selectErme(null);
        }
    }

    public function updateErme()
    {
/*         $requestBody = [
            'ermeid' => $this->selectedErme['ermeid'],
            'cimlet' => $this->selectedErme['cimlet'],
            'tomeg' => $this->selectedErme['tomeg'],
            'darab' => $this->selectedErme['darab'],
            'kiadas' => $this->selectedErme['kiadas'],
            'bevonas' => $this->selectedErme['bevonas'],
        ]; */
        $restController = new RestClientController();
        $response = $restController->putErme($this -> selectedErme);
        error_log('response: ' . json_encode($response));
        if ($response['status'] === 'success') {
            session()->flash('success', $response['message']);
            $this->resetForm(); // frissítés
        } else {
            session()->flash('error', $response['message']);
        }
        //dd(session()->all());
    }

    public function deleteErme()
    {
        if ($this->selectedErme['ermeid'] === null) {
            return;
        }

        $restController = new RestClientController();
        $response = $restController->deleteErme($this->selectedErme['ermeid']);
        if ($response['status'] === 'success') {
            session()->flash('success', $response['message']);
            $this->resetForm(); // frissítés
        } else {
            session()->flash('error', $response['message']);
        }
    }

    public function createErme()
    {
/*         $requestBody = [
            'cimlet' => $this->selectedErme['cimlet'],
            'tomeg' => $this->selectedErme['tomeg'],
            'darab' => $this->selectedErme['darab'],
            'kiadas' => $this->selectedErme['kiadas'],
            'bevonas' => $this->selectedErme['bevonas'],
        ];  */

        $restController = new RestClientController();
        $response = $restController->postErme($this -> selectedErme);
        error_log('response: ' . json_encode($response));

        if ($response['status'] === 'success') {
            session()->flash('success', $response['message']);
            $this->resetForm(); // frissítés
        } else {
            session()->flash('error', $response['message']);
        }
    }

    public function resetForm()
    {
        $this->selectedErme = [
            'ermeid' => null,
            'cimlet' => null,
            'tomeg' => null,
            'darab' => null,
            'kiadas' => null,
            'bevonas' => null,
        ];

        $this->fetchErmek();
    }
}
