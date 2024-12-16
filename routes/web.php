<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'search'])->name('courses.search');
Route::post('/courses/enroll/{courseId}', [CourseController::class, 'enroll'])->name('courses.enroll');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/mentoring', function () {
    return view('mentoring');
})->middleware('auth');
