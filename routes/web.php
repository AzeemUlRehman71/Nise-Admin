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
    return redirect(url('admin/login'));
});
// Route::get('/register', function(){return redirect(url('login'));});
// Route::get('/signup', function(){return redirect(url('login'));});


//// admin
Route::prefix('admin')->group(function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {

    Route::get('logout', function () {
        dd('logout');
    })->name('logout');

    Route::get('/', 'Auth\AdminController@index')->name('dashboard');

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/users', 'AddedUsersController@index')->name('users');
    Route::get('/management', 'AddedUsersController@management')->name('management');
    Route::delete('/management/{id}', 'AddedUsersController@destroyManagement')->name('management.delete');
    Route::post('/management/addmanagement', 'AddedUsersController@addManagement')->name('management.add');

    Route::get('/agency', 'AgencyController@index')->name('agency');
    Route::delete('/agency/{id}', 'AgencyController@destroy')->name('agency.delete');
    Route::post('/agency/addagency', 'AgencyController@store')->name('agency.add');

    Route::delete('/users/{id}', 'AddedUsersController@destroy')->name('users.delete');

    Route::get('/credits', 'CreditsController@index')->name('credits');
    Route::post('/credits/checkInCredits', 'CreditsController@checkInCredits')->name('credits.checkInCredits');
    Route::post('/credits/videoadCredits', 'CreditsController@videoadCredits')->name('credits.videoadCredits');
    Route::post('/credits/invitefriendsCredits', 'CreditsController@invitefriendsCredits')->name('credits.invitefriendsCredits');

    Route::get('/call-rates', 'CallRatesController@index')->name('call.rates');
    Route::post('/call-rates/addcredit', 'CallRatesController@addCredit')->name('call.update.rate');

    Route::post('/call-rates/minuscredit', 'CallRatesController@minusCredit')->name('call.minus.rate');
    Route::get('/call-rates/reset', 'CallRatesController@reset')->name('call.reset.rate');
    Route::get('/call-rates/edit/{id}', 'CallRatesController@edit')->name('call.edit');
    Route::post('/call-rates/update/{id}', 'CallRatesController@update')->name('call.update');

    Route::get('/ads', 'AdsController@index')->name('ads');
    Route::post('/ads/admob', 'AdsController@admob')->name('ads.admob');
    Route::post('/ads/facebook', 'AdsController@facebook')->name('ads.facebook');

    Route::get('/sinch', 'SinchController@index')->name('sinch');
    Route::post('/sinch/store', 'SinchController@store')->name('sinch.store');

    Route::get('/googleBilling', 'GoogleBillingController@index')->name('googleBilling');
    Route::post('/googleBilling/store', 'GoogleBillingController@store')->name('googleBilling.store');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/{id}', 'SettingsController@update')->name('settings.update');


    Route::get('/badges', 'BadgeController@index')->name('badges.index');
    Route::delete('/badges/{id}', 'BadgeController@destroy')->name('badges.delete');
    Route::post('/badges/store', 'BadgeController@store')->name('badges.store');


    Route::get('/gifts', 'GiftController@index')->name('gifts.index');
    Route::delete('/gifts/{id}', 'GiftController@destroy')->name('gifts.delete');
    Route::post('/gifts/store', 'GiftController@store')->name('gifts.store');

    Route::get('/reports', 'ReportsController@index')->name('reports.index');
    Route::post('/block/user', 'ReportsController@blockUser')->name('block.user');

    Route::get('/withdrawal', 'WithdrawController@index')->name('withdrawal.index');
    Route::get('/withdrawal/accept/{id}', 'WithdrawController@accept')->name('withdrawal.accept');
    Route::get('/withdrawal/reject/{id}', 'WithdrawController@reject')->name('withdrawal.reject');


});

Auth::routes();

Route::middleware(['auth'])->group(function () {


});

