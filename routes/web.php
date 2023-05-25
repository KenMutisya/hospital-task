<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LabTechController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistDashboardController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
])->group(function () {

    Route::prefix('receptionist')->group(function () {

        Route::get('/', ReceptionistDashboardController::class)->name('receptionist.dashboard');

        Route::resource('/patient', PatientController::class);

    });

    Route::prefix('doctor')->name('doctor.')->group(function () {
        Route::resource('/', DoctorController::class);
        Route::get('/consult/{appointment}', [DoctorController::class, 'consult'])->name('consult');
        Route::get('/request/{appointment}/labreport', [DoctorController::class, 'labreport'])->name('labreport');
    });

    Route::prefix('labtech')->name('labtech.')->group(function () {
        Route::resource('/', LabTechController::class)->names([
                'index'=>'dashboard',
                'store'=>'store',
        ]);
        Route::get('/consult/{appointment}', [LabTechController::class, 'consult'])->name('consult');

    });

    Route::middleware('userdashboard',)->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
