<?php

use App\Http\Controllers\SpecializationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/specializations', [SpecializationController::class, 'index'])->name('specialIndex');
Route::get('/specializations/create', [SpecializationController::class, 'create'])->name('specialCreate');
Route::post('/specializations/save', [SpecializationController::class, 'save'])->name('specialSave');
Route::get('/specializations/{specialization}', [SpecializationController::class, 'show'])->name('specialShow');
Route::get('/specializations/{specialization}/edit', [SpecializationController::class, 'edit'])->name('specialEdit');
Route::put('/specializations/update/{specialization}', [SpecializationController::class, 'update'])->name('specialUpdate');
Route::delete('/specializations/delete/{specialization}', [SpecializationController::class, 'delete'])->name('specialDelete');
