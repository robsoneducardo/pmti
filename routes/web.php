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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index')->name('index');

Route::get('/activities/data', 'ActivityController@data')->name('activities.data');
Route::get('/activities/{activity}/delete', 'ActivityController@delete')->name('activities.delete');
Route::resource('activities', 'ActivityController');

Route::get('/ministers/data', 'MinisterController@data')->name('ministers.data');
Route::get('/ministers/{minister}/delete', 'MinisterController@delete')->name('ministers.delete');
Route::resource('ministers', 'MinisterController');

Route::get('/districts/data', 'DistrictController@data')->name('districts.data');
Route::get('/districts/{district}/delete', 'DistrictController@delete')->name('districts.delete');
Route::resource('districts', 'DistrictController');

Route::get('/comorbidities/data', 'ComorbidityController@data')->name('comorbidities.data');
Route::get('/comorbidities/{comorbidity}/delete', 'ComorbidityController@delete')->name('comorbidities.delete');
Route::resource('comorbidities', 'ComorbidityController');
