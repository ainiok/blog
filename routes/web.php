<?php

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
Route::get('/', 'ArticleController@index');
Route::post('password/change', 'UserController@changePassword')->middleware('auth');

//setting

Route::group(['middleware' => 'auth', 'prefix' => 'setting'], function () {
    Route::get('/', 'SettingController@index')->name('setting.index');
    Route::get('bind', 'SettingController@bind')->name('setting.bind');
});

//user
Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => '{username}'], function () {
        Route::get('/', 'UserController@show');
    });
});

//dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {
    Route::get('{path?}', 'HomeController@dashboard')->where('path', '[\/\w\.-]*');
});