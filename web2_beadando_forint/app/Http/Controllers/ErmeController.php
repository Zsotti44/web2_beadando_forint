<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Erme;

class ErmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('ermeid')) {
            $ermeid = $request->query('ermeid');
            error_log($ermeid);
            $erme = Erme::find($ermeid);

            if (!empty($erme)) {
                return response() -> json($erme);        
            } else {
                return response() -> noContent();
            }
        } else {
            $ermek = Erme::all();
            return response() -> json($ermek);
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
