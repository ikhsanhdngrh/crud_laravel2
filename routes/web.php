<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class)->middleware('auth');
//code export pdf
Route::post('mahasiswa/export-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'viewPDF'])->name('mahasiswa.view-pdf');