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
        Route::get('/user/attendance', 'userAttendance');
        Route::post('/worktime/start', 'startWorktime');
        Route::post('/worktime/end', 'endWorktime');
        Route::post('/breaktime/start', 'startBreaktime');
        Route::post('/breaktime/end', 'endBreaktime');
    }
);
