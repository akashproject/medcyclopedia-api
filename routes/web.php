<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE, PATCH');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user', [App\Http\Controllers\AuthController::class, 'getAuthUser'])->name('getAuthUser');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::put('/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile'])->name('userupdate');
Route::post('/signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');
Route::post('/send-otp', [App\Http\Controllers\AuthController::class, 'setOtpVerification'])->name('setOtpVerification');

//Institutes
Route::post('/institutes', [App\Http\Controllers\InstituteController::class, 'list'])->name('institutes');
Route::get('/institute/{id}', [App\Http\Controllers\InstituteController::class, 'show'])->name('institute');
Route::get('/institute-courses/{id}', [App\Http\Controllers\InstituteController::class, 'instituteCourses'])->name('instituteCourses');
Route::get('/courses', [App\Http\Controllers\InstituteController::class, 'courses'])->name('courses');
Route::get('/states', [App\Http\Controllers\InstituteController::class, 'states'])->name('states');
Route::get('/countries', [App\Http\Controllers\InstituteController::class, 'countries'])->name('countries');
Route::get('/banks', [App\Http\Controllers\InstituteController::class, 'banks'])->name('banks');

//Exams
Route::get('/exams/{id}', [App\Http\Controllers\ExamController::class, 'getExams'])->name('getExams');
Route::get('/view-exam/{id}', [App\Http\Controllers\ExamController::class, 'viewExam'])->name('viewExam');