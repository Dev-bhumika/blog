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
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/companies', 'CompaniesController@index');
Route::any('/companies/company', 'CompaniesController@company');
Route::any('/companies/company/{id}', 'CompaniesController@company');
Route::any('/companies/delete/{id}', 'CompaniesController@delete');

Route::any('/challans', 'ChallansController@index');
Route::any('/challans/challan', 'ChallansController@challan');
Route::any('/challans/challan/{id}', 'ChallansController@challan');
Route::any('/challans/delete/{id}', 'ChallansController@delete');
Route::any('/challans/view/{id}', 'ChallansController@view');
Route::any('/test/pdf/{id}', 'ChallansController@generatePDF');

