<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AKod;

class AKodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('femid')) {
            $femid = $request->query('femid');
            $akod = AKod::where('femid', $femid)->get();

            if ($akod->isNotEmpty()) {
                return response() -> json($akod);        
            } else {
                return response() -> noContent();
            }
        } else {
            $akodok = AKod::all();
            return response() -> json($akodok);
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
