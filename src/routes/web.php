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


Route::get('/test', "REM\ArtisanUi\Controllers\TestController@index");

Route::middleware(['web'])->group(function () {
    Route::get('/artisanui/models/generate', "REM\ArtisanUi\Controllers\ModelsController@index");
    Route::post('/artisanui/models/generate', "REM\ArtisanUi\Controllers\ModelsController@generate");
});