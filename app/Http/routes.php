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

/* HOME ROUTE */
Route::get('/', 'PagesController@index')->name('home');

/* JOIN ROUTE */
Route::get('join', 'PagesController@join')->name('join');

/* CONTACT ROUTES */
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@send')->name('sendContact');

/* LEGAL ROUTE */
Route::get('legal', 'PagesController@legal')->name('legal');

/* APPLICATION ROUTES */
Route::get('download/application', 'PagesController@downloadapp')->name('downloadapp');

/* BLOG ROUTES */
Route::get('news', 'BlogController@index')->name('blogindex');
Route::get('news/{slug}', 'BlogController@view')->name('blogpost');

/* MEMBER ROUTES */
Route::auth();

Route::group(['as'=>'member::', 'prefix' => 'member', 'middleware' => 'auth'], function() {
    Route::get('addpost', 'BlogController@addpost')->name('addpost');
});
