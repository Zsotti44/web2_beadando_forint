<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anyag;

class AnyagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('femid')) {
            $femid = $request->query('femid');
            error_log($femid);
            $anyag = Anyag::find($femid);

            if (!empty($anyag)) {
                return response() -> json($anyag);        
            } else {
                return response() -> noContent();
            }
        } else {
            $anyagok = Anyag::all();
            return response() -> json($anyagok);
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
    public function show($femid)
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
