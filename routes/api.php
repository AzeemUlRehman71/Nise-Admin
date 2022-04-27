<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckApiKey;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\AuthController@login')->middleware(CheckApiKey::class);
Route::post('register', 'API\AuthController@register')->middleware(CheckApiKey::class);




Route::middleware('auth:api')->group(function(){
    Route::post('pendingCredits', 'API\AuthController@pending_credits');
    Route::post('updateBalance', 'API\AuthController@balance_update');
    Route::get('ads', 'API\AdsController@index');
    Route::post('details', 'API\AuthController@get_user_details_info');
    Route::get('package', 'Api\PackageController@index');
    Route::get('setting', 'Api\SettingController@index');
    // Api route
    Route::get('callrates', 'Api\callratecontroller@list');

    Route::get('update_flag', 'Api\callratecontroller@update_flag');


    Route::get('sinch', 'Api\SinchController@index');

    Route::get('googleBilling', 'Api\GoogleBillingController@index');

    Route::get('fbAds', 'Api\FbAdsController@index');

    Route::get('callrates/{dialcode}', 'Api\callratecontroller@dial_code');

    Route::get('multiApis','Api\MultiApisController@index');

});


