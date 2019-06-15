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
    return redirect('/department');
});

Route::group(['middleware' => ['permission:put department']], function () {
    Route::resource('/department', 'DepartmentController')->only([
        'edit', 'update'
    ]);
});

Route::resource('/department', 'DepartmentController')->except([
    'edit', 'update'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
