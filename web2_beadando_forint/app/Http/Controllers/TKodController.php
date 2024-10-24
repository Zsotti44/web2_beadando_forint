<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TKod;

class TKodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('tervezoid')) {
            $tervezoid = $request->query('tervezoid');
            $tkod = TKod::where('tervezoid', $tervezoid)->get();

            if ($tkod->isNotEmpty()) {
                return response() -> json($tkod);        
            } else {
                return response() -> noContent();
            }
        } else {
            $tkodok = TKod::all();
            return response() -> json($tkodok);
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
