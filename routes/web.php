<?php

use App\Http\Controllers\SpecializationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/specializations', [SpecializationController::class, 'index'])->name('specialIndex');
Route::get('/specializations/create', [SpecializationController::class, 'create'])->name('specialCreate');
