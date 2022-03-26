<?php

use App\Http\Controllers\CreateRoutineController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/form', [RoutineFormController::class, 'index'])->name('form');
Route::post('/dept', [RoutineFormController::class, 'dept'])->name('department.fetch');
Route::post('/shift', [RoutineFormController::class, 'shift']);
Route::post('/session', [RoutineFormController::class, 'session']);
Route::post('/createRoutine', [CreateRoutineController::class, 'createRoutine']);


//Subjects Routes
Route::resource('subjects', SubjectController::class);

//Teachers Rouutes
Route::resource('teachers', TeacherController::class);




//Test Routes
Route::get('/addTeacher', [CreateRoutineController::class, 'addTeacher']);

