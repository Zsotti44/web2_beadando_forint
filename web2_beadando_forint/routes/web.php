<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');
Route::post('/generate-pdf', [App\Http\Controllers\PdfController::class, 'generatePDF']);

/**
 * MNB-s controllerek egy helyen /mnb prefixel
 */
Route::prefix('/mnb')->group(function () {
    Route::get('/mnb', [\App\Http\Controllers\MNBController::class, 'index'])->name('mnb/mnb');
    Route::get('/getWsdl', [\App\Http\Controllers\MNBController::class, 'getWsdl']);
    Route::get('/getAllCurrencies', [\App\Http\Controllers\MNBController::class, 'getAllCurrencies']);
    Route::post('/getDailyRate', [\App\Http\Controllers\MNBController::class, 'getDailyRate']);
    Route::post('/getMonthlyRates', [\App\Http\Controllers\MNBController::class, 'getMonthlyRates']);
    Route::post('/getCurrencyPair', [\App\Http\Controllers\MNBController::class,'getCurrencyPair']);
    Route::get('/exchangeRate', [\App\Http\Controllers\MNBController::class, 'exchangeRate'])->name('mnb/exchangeRate');
    Route::get('/monthlyExchangeRate', [\App\Http\Controllers\MNBController::class, 'monthlyExchangeRate'])->name('mnb/monthlyExchangeRate');
    Route::get('/showCurrencyPair', [\App\Http\Controllers\MNBController::class, 'showCurrencyPair'])->name('mnb/showCurrencyPair');
});

Route::get('informaciok', [App\Http\Controllers\InformacioController::class,'index'])->name('informaciok');

/* ADMIN */
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('isAdmin');
Route::get('/admin/menuk', [\App\Http\Controllers\AdminController::class, 'menuk'])->name('admin.menu')->middleware('isAdmin');

/* API / SOAP*/
Route::any('/soap', [App\Http\Controllers\SoapServerController::class, 'index']);
Route::get('/soapData', [\App\Http\Controllers\SoapClientController::class, 'index'])->name('soapData');

/* API / REST */
Route::get('/rest/erme', [App\Http\Controllers\RestClientController::class, 'index'])->name('rest/erme');

/**
 * SOAP Client controllerek egy helyen /client prefixel
 */
Route::prefix('/client')->group(function () {
    Route::get('/ermek', [App\Http\Controllers\SoapClientController::class, 'getErmek'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/ermekwithallinfo', [App\Http\Controllers\SoapClientController::class, 'getErmekWithAllInfo'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/tervezok', [App\Http\Controllers\SoapClientController::class, 'getTervezok'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/anyagok', [App\Http\Controllers\SoapClientController::class, 'getAnyagok'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/tkodok', [App\Http\Controllers\SoapClientController::class, 'getTKodok'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/akodok', [App\Http\Controllers\SoapClientController::class, 'getAKodok'])->withoutMiddleware(['auth', 'isAdmin']);
    Route::get('/anyagok', [App\Http\Controllers\SoapClientController::class, 'getAnyagok'])->withoutMiddleware(['auth', 'isAdmin']);
});
