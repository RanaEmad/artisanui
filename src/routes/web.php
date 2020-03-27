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
   
    Route::get('/artisanui/controllers/generate', "REM\ArtisanUi\Controllers\ControllersController@index");
    Route::post('/artisanui/controllers/generate', "REM\ArtisanUi\Controllers\ControllersController@generate");
    
    Route::get('/artisanui/migrations/generate', "REM\ArtisanUi\Controllers\MigrationsController@index");
    Route::post('/artisanui/migrations/generate', "REM\ArtisanUi\Controllers\MigrationsController@generate");
    
    Route::get('/artisanui/seeders/generate', "REM\ArtisanUi\Controllers\SeedersController@index");
    Route::post('/artisanui/seeders/generate', "REM\ArtisanUi\Controllers\SeedersController@generate");
    
    Route::get('/artisanui/factories/generate', "REM\ArtisanUi\Controllers\FactoriesController@index");
    Route::post('/artisanui/factories/generate', "REM\ArtisanUi\Controllers\FactoriesController@generate");
});