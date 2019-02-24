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

Route::get('/', 'WelcomeController@index');
Route::get('/employees', 'EmployeeController@index');
Route::get('/leaves'   , 'LeaveController@index');
Route::get('/genders'  , 'GenderController@index');
Route::get('/marital_status'  , 'MaritalStatusController@index');  
Route::get('/distances', 'DistanceController@index');
Route::get('/positions', 'PositionController@index');
