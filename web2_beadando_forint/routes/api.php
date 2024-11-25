<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnyagController;
use App\Http\Controllers\AKodController;
use App\Http\Controllers\ErmeController;
use App\Http\Controllers\TervezoController;
use App\Http\Controllers\TKodController;

Route::middleware('auth.basic')->get('anyag', [AnyagController::class, 'index']);

Route::middleware('auth.basic')->get('akod', [AKodController::class, 'index']);

Route::middleware('auth.basic')->get('tervezo', [TervezoController::class, 'index']);

Route::middleware('auth.basic')->get('tkod', [TKodController::class, 'index']);

Route::middleware('internal_or_basic_auth')->get('erme', [ErmeController::class, 'index']);
Route::middleware('internal_or_basic_auth')->post('erme', [ErmeController::class, 'store']);
Route::middleware('internal_or_basic_auth')->put('erme/{id}', [ErmeController::class, 'update']);
Route::middleware('internal_or_basic_auth')->delete('erme/{id}', [ErmeController::class, 'destroy']);
