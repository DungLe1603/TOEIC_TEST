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
    Route::get('sample-question', 'PageController@sampleQuestion')->name('sample');
    Route::get('score-lever', 'PageController@scoreLever')->name('lever');
    Route::get('toeic-tips', 'PageController@toeicTip')->name('tips');
    Route::get('tests', 'TestController@index')->name('tests.index');
    Route::middleware(['auth'])->group(function () {
        Route::get('tests/{id}/detail', 'TestController@detail')->name('test.detail');
        Route::post('tests/{id}', 'TestController@handleTest')->name('test.doing');
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::post('edit-profile', 'UserController@updateProfile')->name('profile.update');
        Route::get('password', 'UserController@formPassword')->name('password');
        Route::post('change-password', 'UserController@changePassword')->name('password.change');
        Route::get('test-result', 'UserController@testResult')->name('test.result');
    });
});
Route::group(['namespace' => 'Auth'],  function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@handleLogin')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegisterForm')->name('register');
    Route::post('register', 'RegisterController@handleRegister')->name('register');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::resource('users', 'UserController');
    Route::resource('parts', 'PartController');
    Route::get('tests/{id}/questions', 'QuestionController@index') -> name('test.questions');
    Route::get('tests/{id}/questions/create', 'QuestionController@create') -> name('test.questions.create');
    Route::post('tests/{id}/questions', 'QuestionController@store') -> name('test.questions.store');
    Route::get('questions/{question_id}/edit', 'QuestionController@edit') -> name('questions.edit');
    Route::post('questions/{question_id}', 'QuestionController@update') -> name('questions.update');
    Route::get('questions/{question_id}', 'QuestionController@destroy') -> name('questions.destroy');
    Route::resource('tests', 'TestController');
    Route::get('results', 'ResultController@index') -> name('results');
});
