<?php

use App\Http\Controllers\Admin\DataMentorController as AdminDataMentorController;
use App\Http\Controllers\Admin\DataCourseController as AdminDataCourseController;
use App\Http\Controllers\Admin\AnnouncementController as AnnouncementController;
use App\Http\Controllers\Home\HomeController as HomeController;
use App\Http\Controllers\MyCourse\MyCourseController as MyCourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LogbookController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [HomeController::class, 'index'])->name('courses.index');
Route::get('/announcement', [HomeController::class, 'getAnnouncements'])->name('announcement');
Route::get('/search/{slug}', [HomeController::class, 'search'])->name('search');

//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Courses
Route::get('/courses/{slug}', [CourseController::class, 'search'])->name('courses.search');
Route::post('/courses/{slug}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

//MyCourse
Route::get('/mycourse', [MyCourseController::class, 'index'])->name('mycourse');
Route::get('/mycourse/{slug}', [MyCourseController::class, 'showDetail'])->name('courses.show');
Route::get('/mycourse/participant/{slug}', [MyCourseController::class, 'showParticipant'])->name('participant');

//Enroll
Route::get('/enroll/{slug}', [CourseController::class, 'view'])->name('enroll');;
Route::post('/enroll/{slug}')->name('enroll.post');

//logbook
Route::post('/logbook', [LogbookController::class, 'add'])->name('logbook.add');
Route::get('/logbook', [LogbookController::class, 'indexByCourse'])->name('logbook.show');


//Admin start

//Admin mentor
Route::get('/admin/mentor', [AdminDataMentorController::class, 'getMentor']);
Route::post('/admin/mentor/add', [AdminDataMentorController::class, 'addMentor'])->name('addMentor');
Route::post('/admin/mentor/edit-role', [AdminDataMentorController::class, 'editMentorRole'])->name('admin.mentor.editRole');
Route::post('/admin/mentor/destroy', [AdminDataMentorController::class, 'destroyMentor']);

//Admin course
Route::post('/admin/course/add', [AdminDataCourseController::class, 'storeCourse'])->name('store.course');
Route::post('/admin/course/update/{id}', [AdminDataCourseController::class, 'updateCourse']);
Route::delete('/admin/course/delete/{id}', [AdminDataCourseController::class, 'destroyCourse']);

Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/mentor', [AdminDataMentorController::class, 'getMentor'])->name('admin.mentor');
    Route::get('/class', [AdminDataCourseController::class, 'getAllCourse'])->name('admin.class');
    Route::view('/attendance', 'admin.attendance ')->name('admin.attendance');
});
//end admin

//announcement 
Route::post('/upload-announcement', [AnnouncementController::class, 'upload']);
Route::get('/download-announcement/{fileName}', [AnnouncementController::class, 'download']);

Route::get('/dashboard', function () {
    return view('mentee.dashboard');
})->middleware('auth');

Route::get('/mentoring', function () {
    return view('mentoring');
})->middleware('auth');
