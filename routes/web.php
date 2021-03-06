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
Route::get('/', 'Auth\PostController@top')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/drafts/new', 'Auth\PostController@new')->name('drafts.new');
Route::post('/drafts/store', 'Auth\PostController@store')->name('drafts.store');

Route::get('/drafts/{id}', 'Auth\PostController@show')->name('drafts.show');