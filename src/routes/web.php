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
    Route::get('/artisanui', "REM\ArtisanUi\Controllers\ModelsController@index");

    Route::get('/artisanui/models', "REM\ArtisanUi\Controllers\ModelsController@index");
    Route::post('/artisanui/models', "REM\ArtisanUi\Controllers\ModelsController@generate");
   
    Route::get('/artisanui/controllers', "REM\ArtisanUi\Controllers\ControllersController@index");
    Route::post('/artisanui/controllers', "REM\ArtisanUi\Controllers\ControllersController@generate");
    
    Route::get('/artisanui/migrations', "REM\ArtisanUi\Controllers\MigrationsController@index");
    Route::post('/artisanui/migrations', "REM\ArtisanUi\Controllers\MigrationsController@generate");
    
    Route::get('/artisanui/seeders', "REM\ArtisanUi\Controllers\SeedersController@index");
    Route::post('/artisanui/seeders', "REM\ArtisanUi\Controllers\SeedersController@generate");
    
    Route::get('/artisanui/factories', "REM\ArtisanUi\Controllers\FactoriesController@index");
    Route::post('/artisanui/factories', "REM\ArtisanUi\Controllers\FactoriesController@generate");
    
    Route::get('/artisanui/tests', "REM\ArtisanUi\Controllers\TestsController@index");
    Route::post('/artisanui/tests', "REM\ArtisanUi\Controllers\TestsController@generate");
});