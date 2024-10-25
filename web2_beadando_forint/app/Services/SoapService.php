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
        return Erme::all()->toArray();
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
}
