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
    public function store(\App\Http\Requests\ErmeRequest $request)
    {
        $data = $request->validated();
        $erme = Erme::create($data);

        return response()->json($erme, 201);
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
    public function update(\App\Http\Requests\ErmeRequest $request, string $id)
    {
        $erme = Erme::find($id);

        if (!$erme) {
            return response()->json(['message' => 'Az érme nem található.'], 404);
        }

        $erme->update($request->validated());

        return response()->json($erme);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $erme = Erme::find($id);

        if (!$erme) {
            return response()->json(['message' => 'Érme nem található.'], 404);
        }

        $erme->delete();

        return response()->json(['message' => 'Érme sikeresen törölve.']);
    }
}
