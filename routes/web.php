<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;

Route::get('/Create', function () {
    return view('Create');
});

Route::resource('suppliers', SupplierController::class);
Route::resource('purchases', PurchaseController::class);