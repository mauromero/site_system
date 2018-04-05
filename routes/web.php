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
Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/forms/assessments', 'AssessmentController@index');

// Customers
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers/{customer}', 'CustomerController@show');

// Facilites
Route::get('/facilities', 'FacilityController@index');
Route::get('/facilities/{facility}', 'FacilityController@details');

// Assessments
Route::post('/assessments', 'AssessmentController@store');
Route::get('/assessments', 'AssessmentController@create');
Route::get('/assessments/edit/{assessment}', 'AssessmentController@edit');
Route::get('/assessments/{assessment}/tasks/', 'AssessmentController@tasks');
Route::post('/assessments/{assessment}/tasks/', 'AssessmentController@tasks_save');
Route::patch('/assessments/edit/{assessment}', 'AssessmentController@update');

//locations files
Route::post('/locations',function(){
    request()->file('location')->store('locations', 'locations');
    return back();    
});
// Task
// Route::get('/tasks', 'TaskController@create');
// Route::post('/tasks', 'TaskController@store');
// Route::get('/tasks/edit/{task}', 'TaskController@edit');
// Route::post('/tasks/edit/{task}', 'TaskController@update');


// Hazard_Task
Route::get('/hazards_tasks', 'HazardTaskController@create');
Route::post('/hazards_tasks', 'HazardTaskController@store');
Route::get('/hazards_tasks/edit/{task}', 'HazardTaskController@create');
Route::post('/hazards_tasks/edit/{task}', 'HazardTaskController@update');


