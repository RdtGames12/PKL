<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoice', [PDFController::class, 'generatePDFinvoice'])->name('invoice');
Route::get('/invoicepasien', [PDFController::class, 'generatePDFinvoicepasien'])->name('invoicepasien');
Route::get('/invoicepengobatan', [PDFController::class, 'generatePDFinvoicepengobatan'])->name('invoicepengobatan');
