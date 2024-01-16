<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;

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

Route::middleware('auth', 'verified')->controller(TimeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/attendance', 'attendance')->name('show_date');
        Route::get('/user', 'user');
        Route::get('/user/attendance', 'user_attendance');
        Route::post('/worktime/start', 'start_worktime');
        Route::post('/worktime/end', 'end_worktime');
        Route::post('/breaktime/start', 'start_breaktime');
        Route::post('/breaktime/end', 'end_breaktime');
    }
);
