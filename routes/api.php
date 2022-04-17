<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('students', [StudentController::class, 'all'])->name('students');
Route::get('student/{student}', [StudentController::class, 'show'])->where('student', '.*');
Route::get('password_reset/{student}', [StudentController::class, 'reset_student_password'])->where('student', '.*');


