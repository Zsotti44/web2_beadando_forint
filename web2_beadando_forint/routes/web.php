<?php

use Illuminate\Support\Facades\Route;
use App\Models\Erme;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');
Route::post('/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);
Route::get('/mnb', [\App\Http\Controllers\MNBController::class, 'index'])->name('mnb');
Route::get('/teszt', function () {
    $ermek = Erme::all();
    return view('teszt.index', compact('ermek'));
})->name('teszt');

Route::get('informaciok', [App\Http\Controllers\InformacioController::class,'index'])->name('informaciok');

/* ADMIN */
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('isAdmin');
Route::get('/admin/menuk', [\App\Http\Controllers\AdminController::class, 'menuk'])->name('admin.menu')->middleware('isAdmin');

/* API / SOAP*/
Route::any('/soap', [App\Http\Controllers\SoapServerController::class, 'index']);
