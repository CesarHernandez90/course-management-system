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
    return redirect('/login');
});

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::resource('/user', 'UserController');
    Route::resource('/department', 'DepartmentController');
    Route::resource('/coursetype', 'CourseTypeController');
    Route::resource('/period', 'PeriodController');

    
    Route::resource('/course', 'CourseController')->except('create');
    Route::get('/course/create/{fatherPeriod}', 'CourseController@create')->name('course.create');
    Route::get('/course/period/{fatherPeriod}', 'CourseController@period')->name('course.period');

    
    
});

Route::get('/offer', 'OfferController@index')->name('offer.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
