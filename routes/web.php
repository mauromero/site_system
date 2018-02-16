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

///Home
Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forms/assessments', 'AssessmentController@index');

// Customers
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers/{customer}', 'CustomerController@show');

// Facilites
Route::get('/facilities', 'FacilityController@index');
Route::get('/facilities/{facility}', 'FacilityController@details');