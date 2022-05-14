<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/temperature-measurement/add', [App\Http\Controllers\TemperatureMeasurementController::class, 'add']);
Route::post('/temperature-measurement/add', [App\Http\Controllers\TemperatureMeasurementController::class, 'save'])->name('temperature-measurement.save');
