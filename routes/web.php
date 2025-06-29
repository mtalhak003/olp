<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CertificateController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Route to show all tables
Route::get('/users', [UserController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/enrollments', [EnrollmentController::class, 'index']);
Route::get('/contents', [ContentController::class, 'index']);
Route::get('/certificates', [CertificateController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);