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

// the root route points to the index action in the PlacesController
Route::get('/', 'PlacesController@index')->name('home');

// we need only four routes
Route::resource('places', 'PlacesController')->except(['show', 'edit', 'update']);
Route::get('places/dashboard', 'PlacesController@dashboard')->name('places.dashboard');