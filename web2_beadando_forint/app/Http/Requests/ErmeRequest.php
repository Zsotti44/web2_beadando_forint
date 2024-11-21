<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErmeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cimlet' => 'required|integer',
            'tomeg' => 'required|numeric',
            'darab' => 'required|integer',
            'kiadas' => 'required|date',
            'bevonas' => 'nullable|date|after:kiadas', // A bevonásnak a kibocsátás utáninak kell lennie, ha meg van adva
        ];
    }

    public function messages(): array
    {
        return [
            'cimlet.required' => 'A címlet megadása kötelező.',
            'cimlet.integer' => 'A címletnek egész számnak kell lennie.',
            'tomeg.required' => 'A tömeg megadása kötelező.',
            'tomeg.numeric' => 'A tömegnek számnak kell lennie.',
            'darab.required' => 'A darabszám megadása kötelező.',
            'darab.integer' => 'A darabszámnak egész számnak kell lennie.',
            'kiadas.required' => 'A kibocsátás dátumának megadása kötelező.',
            'kiadas.date' => 'A kibocsátás dátuma érvényes dátumnak kell lennie.',
            'bevonas.date' => 'Amennyiben meg van adva, a bevonás dátumának érvényes dátumnak kell lennie.',
            'bevonas.after' => 'A bevonás dátuma nem lehet korábbi, mint a kibocsátás dátuma.',
        ];
    }
}
