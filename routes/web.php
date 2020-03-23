<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-dashboard', 'AdminController@index')->name('admin');

Route::get('/createTeacher', 'AdminController@createTeacher')->name('create');

Route::get('/createModule', 'AdminController@createModule')->name('create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/storeTeacher', 'AdminController@storeTeacher');

Route::post('/storeModule', 'AdminController@storeModule');

Route::get('/deleteTeacher/{id}', 'AdminController@deleteTeacher');

Route::get('/deleteModule/{id}', 'AdminController@deleteModule');

Route::get('/editTeacher/{id}', 'AdminController@editTeacher');

Route::get('/editModule/{id}', 'AdminController@editModule');

Route::post('/updateTeacher/{id}', 'AdminController@updateTeacher');

Route::post('/updateModule/{id}', 'AdminController@updateModule');
