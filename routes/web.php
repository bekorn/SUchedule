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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Auth')->group( function () {

    Route::prefix('/login')->group( function () {
        Route::get('/', 'LoginController@loginPage')->name('login');
        Route::get('/google-auth-redirect', 'LoginController@redirectToProvider')->name('google-auth');
        Route::get('/google-auth-callback', 'LoginController@handleProviderCallback');
    });

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::prefix('user')->group( function () {
    Route::get('{user}', 'UserController@show')->name('user');
});

Route::prefix('course')->group( function () {
    Route::get('/', 'CourseController@index')->name('courses');
    Route::get('{course}', 'CourseController@show')->name('course');
    Route::get('{course}/requirement', 'RequirementController@show')->name('requirement');
});

Route::prefix('instructor')->group( function () {
    Route::get('/', 'InstructorController@index')->name('instructors');
    Route::get('/{instructor}', 'InstructorController@show')->name('instructor');
});

Route::prefix('mono-schedule')->group( function () {
    Route::get('{mono_schedule}', 'MonoScheduleController@show');
});

Route::prefix('poly-schedule')->group( function () {
    Route::get('{poly_schedule}', 'PolyScheduleController@show');
});