<?php

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

    Route::prefix('doctor')->group(function () {
        Route::get('/', function () {
            return view('doctor.dashboard');
        })->name('doctor.dashboard');
    });

    Route::prefix('labtech')->group(function () {
        Route::get('/', function () {
            return view('labtech.dashboard');
        })->name('labtech.dashboard');
    });

    Route::middleware('userdashboard',)->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
