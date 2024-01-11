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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TimeController::class, 'index']);
    Route::get('/attendance', [TimeController::class, 'attendance'])->name('show_date');
});

Route::post('/worktime/start', [TimeController::class, 'start_worktime']);
Route::post('/worktime/end', [TimeController::class, 'end_worktime']);
Route::post('/breaktime/start', [TimeController::class, 'start_breaktime']);
Route::post('/breaktime/end', [TimeController::class, 'end_breaktime']);
