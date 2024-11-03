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
     * @return object
     */
    public function getErmek()
    {
        $ermek = Erme::all()->toArray();

        return (object)[
            'getErmekResult' => $ermek
        ];
    }

    /**
     * Anyagok lekerdezese
     *
     * @return object
     */
    public function getAnyagok()
    {
        return (object)[
         'getAnyagokResult' => Anyag::all()->toArray(),
        ];
    }

    /**
     * Erme anyag osszetevoi
     *
     * @return object
     */
    public function getAKodok()
    {
        return (object)[
            'getAKodokResult' => AKod::all()->toArray(),
        ];
    }

    /**
     * Tervezok lekerdezese
     *
     * @return object
     */
    public function getTervezok()
    {
        return (object)[
            'getTervezokResult' => Tervezo::all()->toArray(),
        ];
    }

    /**
     * Erme tervezoi
     *
     * @return object
     */
    public function getTKodok()
    {
        return (object)[
            'getTKodokResult' => TKod::all()->toArray(),
        ];
    }
    /**
     * Erme with all info
     *
     * @return object
     */
    public function getErmekWithAllInfo()
    {
        return (object)[
            'getErmekWithAllInfoResult' => Erme::with(['anyagok', 'tervezok'])->get()->toArray(),
        ];
    }


}
