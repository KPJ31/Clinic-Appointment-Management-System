<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
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

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctorIndex');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctorCreate');
Route::post('/doctors/save', [DoctorController::class, 'save'])->name('doctorSave');
Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctorShow');
Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctorEdit');
Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctorUpdate');
Route::delete('/doctors/{doctor}', [DoctorController::class, 'delete'])->name('doctorDelete');

Route::get('/servies', [ServiceController::class, 'index'])->name('serviceIndex');
Route::get('/servies/create', [ServiceController::class, 'create'])->name('serviceCreate');
Route::post('/servies', [ServiceController::class, 'save'])->name('serviceSave');
Route::get('/servies/{service}', [ServiceController::class, 'show'])->name('serviceShow');
Route::get('/servies/{service}/edit', [ServiceController::class, 'edit'])->name('serviceEdit');
Route::put('/servies/{service}', [ServiceController::class, 'update'])->name('serviceUpdate');
Route::delete('/servies/{service}', [ServiceController::class, 'delete'])->name('serviceDelete');

Route::get('/patients', [PatientController::class, 'index'])->name('patientIndex');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patientCreate');
Route::post('/patients', [PatientController::class, 'save'])->name('patientSave');
Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('patientShow');
Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patientEdit');
Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patientUpdate');
Route::delete('/patients/{patient}', [PatientController::class, 'delete'])->name('patientDelete');

Route::get('/appoinments', [AppointmentController::class, 'index'])->name('appointmentIndex');
Route::get('/appoinments/create', [AppointmentController::class, 'create'])->name('appointmentCreate');
Route::post('/appoinments', [AppointmentController::class, 'save'])->name('appointmentSave');
Route::get('/appoinments/{appointment}', [AppointmentController::class, 'show'])->name('appointmentShow');
Route::get('/appoinments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointmentEdit');
Route::put('/appoinments/{appointment}', [AppointmentController::class, 'update'])->name('appointmentUpdate');
Route::delete('/appoinments/{appointment}', [AppointmentController::class, 'delete'])->name('appointmentDelete');
