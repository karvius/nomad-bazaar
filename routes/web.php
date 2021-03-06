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

//Authentication routes.
Auth::routes();

//Pages routes.
Route::get('/', 'PageController@getIndex');
Route::get('home', 'HomeController@index')->name('home');
Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');
Route::get('about', 'PageController@getAbout');

//Listings routes.
Route::resource('listings', 'ListingController');
//Tags routes.
Route::get('tags', 'TagController@index')->name('tags.index');
Route::get('tags/{tag}', 'TagController@show')->name('tags.show');
//Query routes.
Route::get('queries', 'QueryController@search')->name('queries.search');