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
Route::middleware('auth')->group(function () {
    Route::get('/', [TimeController::class, 'index']);
});

Route::get('/attendance', [TimeController::class, 'list']);
Route::post('/start_worktime', [TimeController::class, 'start_worktime']);
Route::post('/end_worktime', [TimeController::class, 'end_worktime']);
Route::post('/start_breaktime', [TimeController::class, 'start_breaktime']);
Route::post('/end_breaktime', [TimeController::class, 'end_breaktime']);

