<?php

use Illuminate\Support\Facades\Route;
use App\Models\Erme;
use App\Livewire\MNBSoap;
use App\Livewire\TestComponent;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');
Route::post('/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);
Route::get('/mnb', [\App\Http\Controllers\MNBController::class, 'index'])->name('mnb');

//Route::get('/mnb',MNBSoap::class)->name('mnb');
Route::get('/test', TestComponent::class);
Route::get('/teszt', function () {
    $ermek = Erme::all();
    return view('teszt.index', compact('ermek'));
})->name('teszt');

Route::any('/soap', [App\Http\Controllers\SoapServerController::class, 'index']);
