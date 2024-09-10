<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/enrollment/{id}', [EnrollmentController::class, 'enrollment'])
        ->name('enrollment');
Route::get('/enrollment-view/{id}', [EnrollmentController::class, 'enrollmentView'])
        ->name('enrollment-view'); 
Route::get('/enrollment-step2/{id}', [EnrollmentController::class, 'enrollmentStep2'])
        ->name('enrollment-step2'); 

Route::post('/enrollment-step1-save', [EnrollmentController::class, 'enrollmentStep1Save'])
        ->name('enrollment-step1-save'); 
Route::put('/enrollment-step2-save/{id}', [EnrollmentController::class, 'enrollmentStep2Save'])
        ->name('enrollment-step2-save'); 

Route::put('/enrollment-step1-update/{id}', [EnrollmentController::class, 'enrollmentStep1Update'])
        ->name('enrollment-step1-update');
Route::put('/enrollment-step2-update/{id}', [EnrollmentController::class, 'enrollmentStep2Update'])
        ->name('enrollment-step2-update'); 
        
Route::get('/enrollment-preview/{id}', [EnrollmentController::class, 'showEnrollmentPreview'])
        ->name('enrollment-preview');
Route::get('/enrollment-finish', [EnrollmentController::class, 'showEnrollmentFinish'])
        ->name('enrollment-finish');
