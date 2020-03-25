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

Route::get('/deadline-dashboard/{orderColumn?}', 'DeadlineController@index')->name('deadlines');


Route::get('/teacher/create', 'TeacherController@create')->name('create');

Route::get('/module/create', 'ModuleController@create')->name('create');

Route::get('/assignment/create', 'AssignmentController@create')->name('create');

Route::post('/teacher/store', 'TeacherController@store');

Route::post('/module/store', 'ModuleController@store');

Route::post('/assignment/store', 'AssignmentController@store');

Route::get('/teacher/delete/{id}', 'TeacherController@delete');

Route::get('/module/delete/{id}', 'ModuleController@delete');

Route::get('/assignment/delete/{id}', 'AssignmentController@delete');

Route::get('/teacher/edit/{id}', 'TeacherController@edit');

Route::get('/module/edit/{id}', 'ModuleController@edit');

Route::get('/assignment/edit/{id}', 'AssignmentController@edit');

Route::post('/teacher/update/{id}', 'TeacherController@update');

Route::post('/module/update/{id}', 'ModuleController@update');

Route::post('/assignment/update/{id}', 'AssignmentController@update');

