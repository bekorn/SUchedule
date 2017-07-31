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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group( function () {
    Route::get('{user}', 'UserController@show')->name('user');
});

Route::prefix('course')->group( function () {
    Route::get('/', 'CourseController@index');
    Route::get('{course}', 'CourseController@show')->name('course');
    Route::get('{course}/requirement', 'RequirementController@show')->name('requirement');
});

Route::prefix('mono-schedule')->group( function () {
    Route::get('{mono_schedule}', 'MonoScheduleController@show');
});

Route::prefix('poly-schedule')->group( function () {
    Route::get('{poly_schedule}', 'PolyScheduleController@show');
});



