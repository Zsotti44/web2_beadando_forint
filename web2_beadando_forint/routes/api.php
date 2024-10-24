<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnyagController;
use App\Http\Controllers\AKodController;
use App\Http\Controllers\ErmeController;
use App\Http\Controllers\TervezoController;
use App\Http\Controllers\TKodController;


/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::middleware('auth.basic')->get('anyag', [AnyagController::class, 'index']);

Route::middleware('auth.basic')->get('akod', [AKodController::class, 'index']);

Route::middleware('auth.basic')->get('erme', [ErmeController::class, 'index']);

Route::middleware('auth.basic')->get('tervezo', [TervezoController::class, 'index']);

Route::middleware('auth.basic')->get('tkod', [TKodController::class, 'index']);