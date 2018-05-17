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

///User
Route::get('/users/profile', 'ProfileController@show')->name('profile');
Route::get('/users/forms', 'ProfileController@index')->name('forms');


///Home
// Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/forms/assessments', 'AssessmentController@index');

// Customers
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::post('/customers', 'CustomerController@store');
Route::get('/customers/create', 'CustomerController@create');
Route::get('/customers/{customer}', 'CustomerController@show');
Route::get('/customers/edit/{customer}', 'CustomerController@edit');
Route::patch('/customers/edit/{customer}', 'CustomerController@update');
Route::get('/customers/delete/{customer}', 'CustomerController@delete');
Route::delete('/customers/delete/{customer}', 'CustomerController@destroy');

// Facilites
Route::get('/facilities', 'FacilityController@index');
Route::get('/facilities/{facility}', 'FacilityController@details');

// Assessments
Route::get('/assessments', 'AssessmentController@create');
Route::post('/assessments', 'AssessmentController@store');
Route::get('/assessments/edit/{assessment}', 'AssessmentController@edit');
Route::get('/assessments/{assessment}/tasks/', 'TaskController@index');
Route::post('/assessments/{assessment}/tasks/', 'AssessmentController@tasks_save');
Route::patch('/assessments/edit/{assessment}', 'AssessmentController@update');
Route::patch('/assessments/{assessment}/image', 'AssessmentController@image_store');
Route::get('/assessments/{assessment}/image', 'AssessmentController@image_show');
Route::get('/assessments/delete/{assessment}', 'AssessmentController@delete');
Route::delete('/assessments/delete/{assessment}', 'AssessmentController@destroy');

//locations files
// Route::post('/locations',function(){
//     request()->file('location')->store('locations', 'locations');
//     return back();    
// });

// Task
Route::get('/tasks', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/edit/{task}', 'TaskController@edit');
Route::post('/tasks/edit/{task}', 'TaskController@update');
Route::patch('/tasks/rename/{task}', 'TaskController@rename');
Route::get('/tasks/delete/{task}', 'TaskController@delete');
Route::delete('/tasks/delete/{task}', 'TaskController@destroy');

// Hazard_Task
Route::get('/hazards_tasks', 'HazardTaskController@create');
Route::post('/hazards_tasks', 'HazardTaskController@store');
Route::patch('/hazards_tasks/edit/{hazard_task}', 'HazardTaskController@update');
Route::get('/hazards_tasks/edit/{hazard_task}', 'HazardTaskController@edit');
Route::get('/hazards_tasks/delete/{hazard_task}', 'HazardTaskController@delete');
Route::delete('/hazards_tasks/delete/{hazard_task}', 'HazardTaskController@destroy');
