<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\MpesaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Mpesa Online order
Route::post('online', [MpesaController::class, 'lipaNaMpesaPassword'])->name('online');
Route::post('access/token', [MpesaController::class, 'generateAccessToken'])->name('access_token');
Route::post('stk/push', [MpesaController::class, 'customerMpesaSTKPush'])->name('stk_push');
Route::post('stk/push2', [TransactionController::class, 'stkPushRequest'])->name('stk_push2');
Route::post('validation', [MpesaController::class, 'mpesaValidation'])->name('validation');
Route::post('transaction/confirmation', [MpesaController::class, 'mpesaConfirmation'])->name('transaction_confirmation');
Route::post('register/url', [MpesaController::class, 'mpesaRegisterUrls'])->name('register_url');
Route::post('/mpesa/order', [TransactionController::class, 'stkPushRequest'])->name('mpesa.order');

