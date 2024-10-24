<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tervezo;

class TervezoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('tid')) {
            $tid = $request->query('tid');
            //error_log($tid);
            $tervezo = Tervezo::find($tid);

            if (!empty($tervezo)) {
                return response() -> json($tervezo);        
            } else {
                return response() -> noContent();
            }
        } else {
            $tervezok = Tervezo::all();
            return response() -> json($tervezok);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
