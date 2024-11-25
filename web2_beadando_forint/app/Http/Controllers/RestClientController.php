<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class RestClientController extends Controller
{
    public $ermek = [];
    public $selectedErme = null;
    protected $user = null;
    protected $restErme = null;
    protected $url = "";

    public function __construct()
    {
        $this->user = Auth::user();
        $this->restErme = new ErmeController();
        $this->url = 'http://katonazsoltweb2.testhosting.hu/api/erme';

    }
    public function mount()
    {
        if (!Auth::check()) {
            abort(404, 'Nem található');
        }

        $this->loadErmek();
    }

    public function index()
    {
        //$this->url = config('services.api.base_url') . '/api/erme';
        $this->mount();
        return view('RESTclient.restClient', ['ermek' => $this->ermek]);
    }

    public function getErmek() {
        $resp = $this->loadErmek();
        return $this->ermek;
    }

    public function loadErmek()
    {
        $response = Http::withHeaders(['X-Internal-Request' => 'true'])->get($this->url);
        
        if ($response->ok()) {
            $this->ermek = $response->json();
        } else {
            return [
                'status' => 'success',
                'message' => 'Az új adat sikeresen rögzítve!'
            ];
        }  
    }

    public function postErme($ermeObj) {
        
        $requestBody = [
            'cimlet' => $ermeObj['cimlet'],
            'tomeg' => $ermeObj['tomeg'],
            'darab' => $ermeObj['darab'],
            'kiadas' => $ermeObj['kiadas'],
            'bevonas' => $ermeObj['bevonas'],
        ];
        $response = Http::withHeaders(['X-Internal-Request' => 'true'])->post($this->url, $requestBody);

        if ($response->failed()) {
            return [
                'status' => 'error',
                'message' => $response->body() . PHP_EOL
            ];
        } else {
            return [
                'status' => 'success',
                'message' => 'Az új adat sikeresen rögzítve!'
            ];
        }
    }
     
    public function putErme($ermeObj) {
        
        $requestBody = [
            'ermeid' => $ermeObj['ermeid'],
            'cimlet' => $ermeObj['cimlet'],
            'tomeg' => $ermeObj['tomeg'],
            'darab' => $ermeObj['darab'],
            'kiadas' => $ermeObj['kiadas'],
            'bevonas' => $ermeObj['bevonas'],
        ];
        $response = Http::withHeaders(['X-Internal-Request' => 'true'])->put($this->url.'/'.$requestBody['ermeid'], $requestBody);

        if ($response->failed()) {
            return [
                'status' => 'error',
                'message' => $response->body() . PHP_EOL
            ];
        } else {
            return [
                'status' => 'success',
                'message' => 'A módosítás sikeres!'
            ];
        }
    }

    public function deleteErme($ermeid) {
        
        $response = Http::withHeaders(['X-Internal-Request' => 'true'])->delete($this->url.'/'.$ermeid);

        if ($response->failed()) {
            return [
                'status' => 'error',
                'message' => $response->body() . PHP_EOL
            ];
        } else {
            return [
                'status' => 'success',
                'message' => 'A törleés sikeres!'
            ];
        }
    }

}
