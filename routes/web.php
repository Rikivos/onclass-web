<?php

use App\Http\Controllers\Admin\DataController as AdminDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MyCourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('courses.index');
});


//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Courses
Route::get('/', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'search'])->name('courses.search');
Route::post('/courses/{slug}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
Route::get('/mycourse', [MyCourseController::class, 'index'])->name('mycourse');
Route::get('/mycourse/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/enroll/{slug}', [CourseController::class, 'view'])->name('enroll');;
Route::post('/enroll/{slug}')->name('enroll.post');

//logbook
Route::post('/logbook', [LogbookController::class, 'add'])->name('logbook.add');
Route::get('/logbook', [LogbookController::class, 'indexByCourse'])->name('logbook.show');


//Admin

//mentor
Route::get('/admin/mentor', [AdminDataController::class, 'getMentor']);
Route::post('/admin/mentor/add', [AdminDataController::class, 'addMentor']);
Route::post('/admin/mentor/delete', [AdminDataController::class, 'addMentor']);

Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/mentor', [AdminDataController::class, 'getMentor'])->name('admin.mentor');
    Route::get('/class', [AdminDataController::class, 'getCourse'])->name('admin.class');
    Route::view('/attendance','admin.attendance ')->name('admin.attendance');
});
Route::get('/mentor', [AdminDataController::class, 'search']);


//end admin

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/mentoring', function () {
    return view('mentoring');
})->middleware('auth');

Route::get('/participant', function () {
    return view('participant');
});
