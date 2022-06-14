<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CreateRoutineController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoutineFormController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', array(HomeController::class, 'index'))->name('home');
Route::get('/form', array(RoutineFormController::class, 'index'))->name('form');
Route::post('/dept', array(RoutineFormController::class, 'dept'))->name('department.fetch');
Route::post('/shift', array(RoutineFormController::class, 'shift'));
Route::post('/session', array(RoutineFormController::class, 'session'));
Route::post('/createRoutine', array(CreateRoutineController::class, 'createRoutine'));
Route::get('/showRoutine', array(CreateRoutineController::class, 'showRoutine'));
Route::get('/routineApprove/{batch_no}', array(CreateRoutineController::class, 'routineApprove'))->name('routineApprove');
Route::get('/downloadPdf/{batch_no}', [DownloadController::class, 'download_routine'])->name('download.pdf');

//Subjects Routes
Route::resource('subjects', SubjectController::class);

//Batchs Routes
Route::resource('batchs', BatchController::class);

//Teachers Rouutes
Route::resource('teachers', TeacherController::class);
Route::get('addTeacherSub/{id}/{dept}', array(TeacherController::class, 'addTeacherSub'))->name('addTeacherSub');
Route::post('/sub_add_tea', array(TeacherController::class, 'sub_add_tea'));
Route::post('/addTeacherSub', array(TeacherController::class, 'add_teacher_sub'));
Route::get('routineTeacher', array(TeacherController::class, 'routineTeacher'));

//Test Routes
Route::get('/addTeacher', array(CreateRoutineController::class, 'addTeacher'));
Route::get('pdf', array(CreateRoutineController::class, 'generatePdf'));
