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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@handleLogin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

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
    Route::resource('comments', 'CommentController')->only('index', 'show', 'destroy');
    // Route::resource('questions', 'QuestionController');
});