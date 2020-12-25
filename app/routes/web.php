<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/exchange', [\App\Http\Controllers\ExchangeController::class, 'index'])
        ->name('exchange');
    Route::post('/doExchange', [\App\Http\Controllers\ExchangeController::class, 'doExchange'])
        ->name('doExchange');
    Route::get('/history', [\App\Http\Controllers\TransactionController::class, 'index'])
        ->name('history');
    Route::post('/transactions/get-table', [\App\Http\Controllers\TransactionController::class, 'datatable'])
        ->name('transactions.get-table');
});

