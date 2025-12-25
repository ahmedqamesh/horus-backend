<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('customers', \App\Http\Controllers\Api\V1\CustomerController::class);
    Route::apiResource('invoices', \App\Http\Controllers\Api\V1\InvoiceController::class);
});