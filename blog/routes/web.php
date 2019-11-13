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


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    // user
    Route::get('list','Dashboard\UserController@list')->name('users.list');
    Route::get('users','Dashboard\UserController@index')->name('users.index');
    Route::get('users/{user}/show','Dashboard\UserController@show')->name('users.show');
    Route::get('users/create','Dashboard\UserController@create')->name('users.create');
    Route::post('users/store','Dashboard\UserController@store')->name('users.store');
    Route::get('users/{user}/edit','Dashboard\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update','Dashboard\UserController@update')->name('users.update');
    Route::delete('users/{user}/delete','Dashboard\UserController@destroy')->name('users.delete');
    // end user
});

Route::get('/', function () {
    return view('welcome');
});
