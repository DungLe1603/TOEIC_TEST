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

Route::group(['namespace' => 'User'],  function () {
    Route::get('/', 'PageController@homePage')->name('home');
    Route::get('/sample-question', 'PageController@sampleQuestion')->name('sample');
    Route::get('/score-lever', 'PageController@scoreLever')->name('lever');
    Route::get('/toeic-tips', 'PageController@toeicTip')->name('tips');
    Route::get('/tests', 'TestController@index')->name('tests.index');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@handleLogin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::resource('users', 'UserController');
    Route::resource('parts', 'PartController');
    Route::resource('tests', 'TestController');
    Route::resource('comments', 'CommentController')->only('index', 'show', 'destroy');
});
