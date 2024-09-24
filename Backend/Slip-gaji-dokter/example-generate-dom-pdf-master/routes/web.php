<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/download-default-gaji', [PDFController::class, 'generatePDF'])->name('download.default.gaji');
Route::get('/download-gaji-potongan0', [PDFController::class, 'generatePDF2'])->name('download.gaji.potongan0');
Route::get('/download-gaji-potongan0-tambahan0', [PDFController::class, 'generatePDF3'])->name('download.gaji.potongan0.tambahan0');

