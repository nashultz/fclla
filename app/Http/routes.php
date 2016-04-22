<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index')->name('home');

Route::get('join', 'PagesController@join')->name('join');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@send')->name('sendContact');
