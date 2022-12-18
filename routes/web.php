<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListprojectController;

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

Route::resource('/todo', ListprojectController::class);

Route::get('/onprogres', [ListprojectController::class, 'onprogres'])->name('onprogres');
Route::get('/delay', [ListprojectController::class, 'delay'])->name('delay');
Route::get('/finish', [ListprojectController::class, 'finish'])->name('finish');
Route::get('/report', [ListprojectController::class, 'report'])->name('report');