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

    public function mount()
    {
        if (!Auth::check()) {
            abort(404, 'Nem található');
        }

        $this->loadErmek();
    }

    public function index()
    {
        $this->url = config('services.api.base_url') . '/api/erme';
        $this->mount();
        return view('RESTclient.restClient', ['ermek' => $this->ermek]);
    }

    public function getErmek() {
        $resp = $this->loadErmek();
        return $this->ermek;
    }

    public function loadErmek()
    {
        $user = Auth::user();

        $response = Http::withBasicAuth($user->email, $user->password)->get(config('services.api.base_url') . '/api/erme');
        if ($response->ok()) {
            $this->ermek = $response->json();
        } else {
           // session()->flash('error', 'Nem sikerült betölteni az érméket.');
            session()->flash('error', 'Hiba történt: ' . $response->status() . ' - ' . config('services.api.base_url') . '/api/erme');

        }

    }

    public function postErme($ermeObj) {
        error_log('POST erme: ' . json_encode($ermeObj));
        $restErme = new ErmeController();

        $requestBody = [
            'cimlet' => $ermeObj['cimlet'],
            'tomeg' => $ermeObj['tomeg'],
            'darab' => $ermeObj['darab'],
            'kiadas' => $ermeObj['kiadas'],
            'bevonas' => $ermeObj['bevonas'],
        ];
        $response = Http::withBasicAuth($user->email, $user->password)->post(config('services.api.base_url').'/api/erme', $requestBody);
        error_log('post response: ' . json_encode($response));

        if ($response->failed()) {
            $response = [
                'status' => 'error',
                'message' => 'A rögzítés nem sikerült!'
            ];
            return $response;
        } else {
            $response = [
                'status' => 'success',
                'message' => 'Az új adat sikeresen rögzítve!'
            ];
            return $response;
        }
    }

    public function putErme($ermeObj) {
        error_log('PUT erme: ' . json_encode($ermeObj));
        $restErme = new ErmeController();

        $requestBody = [
            'ermeid' => $ermeObj['ermeid'],
            'cimlet' => $ermeObj['cimlet'],
            'tomeg' => $ermeObj['tomeg'],
            'darab' => $ermeObj['darab'],
            'kiadas' => $ermeObj['kiadas'],
            'bevonas' => $ermeObj['bevonas'],
        ];
        $response = Http::withBasicAuth($user->email, $user->password)->put(config('services.api.base_url').'/api/erme/'.$requestBody['ermeid'], $requestBody);
        error_log('put response: ' . json_encode($response));

/*         $response = [
            'status' => 'success',
            'message' => 'A módosítás sikeres!'
        ];
        return $response; */

        if ($response->failed()) {
            $response = [
                'status' => 'error',
                'message' => 'A módosítás sikertelen!'
            ];
            return $response;
        } else {
            $response = [
                'status' => 'success',
                'message' => 'A módosítás sikeres!'
            ];
            return $response;
        }
    }

    public function deleteErme($ermeid) {
        error_log('DELETE erme: ' . json_encode($ermeid));
        $restErme = new ErmeController();

        $response = Http::withBasicAuth($user->email, $user->password)->delete(config('services.api.base_url').'/api/erme/'.$ermeid);
        error_log('delete response: ' . json_encode($response));

        if ($response->failed()) {
            $response = [
                'status' => 'error',
                'message' => 'A törleés sikertelen!'
            ];
            return $response;
        } else {
            $response = [
                'status' => 'success',
                'message' => 'A törleés sikeres!'
            ];
            return $response;
        }
    }

}
