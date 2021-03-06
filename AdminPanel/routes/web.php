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

Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/companies', 'CompanyController@store')->name('company.submit');
Route::get('/company/{id}', 'CompanyController@edit')->name('company.edit');
Route::post('/company/edit/{id}', 'CompanyController@update')->name('company.update');
Route::get('/company/delete/{id}', 'CompanyController@destroy')->name('company.delete');

