<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MakeController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\CarController::class, 'index']);

Route::resource('car', 'App\Http\Controllers\CarController');

Route::post('changeStatus', [App\Http\Controllers\CarController::class, 'changeStatus'])->name('changeStatus');
Route::get('search', [\App\Http\Controllers\CarController::class, 'search'])->name('search');
Route::get('tagSearch', [\App\Http\Controllers\CarController::class, 'tagSearch'])->name('tagSearch');

Route::resource('userCar', 'App\Http\Controllers\UserCarController');

