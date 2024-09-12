<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V2\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('v2')->group(function () {
//     Route::get('students/acceptance', [StudentController::class, 'index']);
//     Route::get('students/acceptance/{admission_year}', [StudentController::class, 'getStudentsByAcceptance']);
//     Route::get('students/{student_no}', [StudentController::class, 'getStudentsByStudentNo']);
    
// });
Route::prefix('v2')->middleware('check.token')->group(function () {
    Route::get('/enrollees/search', [StudentController::class, 'searchEnrollees'])
    ->name('enrolleesSearch');    
    Route::get('/enrollees/{id}', [StudentController::class, 'enrolleesById'])
    ->name('enrolleesById');   
    Route::get('/enrollees', [StudentController::class, 'AllEnrollees'])
    ->name('enrolleesAll'); 
});



