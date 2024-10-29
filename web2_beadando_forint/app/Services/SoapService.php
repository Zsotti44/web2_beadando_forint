<?php

namespace App\Services;

use App\Models\Erme;
use App\Models\Anyag;
use App\Models\AKod;
use App\Models\TKod;
use App\Models\Tervezo;


class SoapService
{
    /**
     * Ermek lekerdezese
     * 
     * @return array
     */
    public function getErmek()
    {
        error_log('jo a hely');
        $ermek = Erme::all()->toArray();
        foreach ($ermek as $erme) {
            error_log("Elem: " . print_r($erme, true));
        } 
        return $ermek;
    }

    /**
     * Anyagok lekerdezese
     * 
     * @return array
     */
    public function getAnyagok()
    {
        return Anyag::all()->toArray();
    }

    /**
     * Erme anyag osszetevoi
     * 
     * @return array
     */
    public function getAKodok()
    {
        return AKod::all()->toArray();
    }

    /**
     * Tervezok lekerdezese
     * 
     * @return array
     */
    public function getTervezok()
    {
        return Tervezo::all()->toArray();
    }

    /**
     * Erme tervezoi
     * 
     * @return array
     */
    public function getTKodok()
    {
        return TKod::all()->toArray();
    }    

    /**
     * teszteles
     * 
     * @return array
     */
    public function getHello()
    {
        return "Helloka";
    }    
}
