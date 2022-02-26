<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoutineFormController;
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
