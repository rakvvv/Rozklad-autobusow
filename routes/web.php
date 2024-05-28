<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('schedules', ScheduleController::class);
Route::get('/search', [ScheduleController::class, 'searchSchedules'])->name('search');
Route::get('/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout'); 
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});


