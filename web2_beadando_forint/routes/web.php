<?php

use Illuminate\Support\Facades\Route;
use App\Models\Erme;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');
Route::post('/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);
Route::post('/get-relevant-options', [App\Http\Controllers\PdfController::class, 'getRelevantOptions'])->name('getRelevantOptions');

Route::get('/teszt', function () {
    $ermek = Erme::all();
    return view('teszt.index', compact('ermek'));
});
