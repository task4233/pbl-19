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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/reasons'   , 'LeaveController@index')->name('reasons');
Route::get('/genders'  , 'GenderController@index')->name('genders');
Route::get('/marital_status'  , 'MaritalStatusController@index')->name('marital_status');  
Route::get('/distances', 'DistanceController@index')->name('distances');
Route::get('/positions', 'PositionController@index')->name('positions'); 
