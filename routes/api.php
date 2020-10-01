<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EndUserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\ScoreController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
        'middleware' => 'api'
    ], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('verification_code', 'App\Http\Controllers\AuthController@verification_code');
    Route::post('verify', 'App\Http\Controllers\AuthController@verify');
});

Route::group([
        'middleware' => 'jwt.verify'
    ], function ($router) {

    //######################################################################################################################
    Route::resource('activity', ActivityController::class);

    //######################################################################################################################
    Route::resource('city', CityController::class);

    //######################################################################################################################
    Route::resource('customer', CustomerController::class);

    //######################################################################################################################
    Route::resource('end_user', EndUserController::class);

    //######################################################################################################################
    Route::resource('language', LanguageController::class);

    //######################################################################################################################
    Route::resource('message', MessageController::class);

    //######################################################################################################################
    Route::resource('payment', PaymentController::class);

    //######################################################################################################################
    Route::resource('product', ProductController::class);

    //######################################################################################################################
    Route::resource('scan', ScanController::class);

    //######################################################################################################################
    Route::resource('score', ScoreController::class);

});
