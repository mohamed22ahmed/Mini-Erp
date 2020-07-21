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

Route::get('/lang/{lang}', 'LangController@index');

// Route::get('ajaxdata', 'StudentController@index')->name('ajaxdata');
// Route::get('ajaxdata/getdata', 'StudentController@getdata')->name('ajaxdata.getdata');

// Route::post('ajaxdata/postdata', 'StudentController@postdata')->name('ajaxdata.postdata');

// Route::get('ajaxdata/fetchdata/', 'StudentController@fetchdata')->name('ajaxdata.fetchdata');
Auth::routes();
// Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
