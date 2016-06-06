<?php

/* HOME ROUTE */
Route::get('/', 'PagesController@index')->name('home');

/* JOIN ROUTE
Route::get('join', 'PagesController@join')->name('join');*/

/* CONTACT ROUTES
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@send')->name('sendContact');*/

/* LEGAL ROUTE
Route::get('legal', 'PagesController@legal')->name('legal');*/

/* APPLICATION ROUTES
Route::get('application/download', 'ApplicationController@downloadapp')->name('downloadapp');
Route::get('application', 'ApplicationController@index')->name('application');
Route::post('application', 'ApplicationController@save')->name('saveapp');
Route::get('application/{application}/print', 'ApplicationController@printfilledapp')->name('filledapp');*/

/* BLOG ROUTES
Route::get('news', 'BlogController@index')->name('blogindex');
Route::get('news/{slug}', 'BlogController@view')->name('blogpost');*/

/* MEMBER ROUTES
Route::auth();*/

/*group(['as'=>'member::', 'prefix'=>'member'], function() {
    get('newpost', 'BlogController@newpost')->name('newpost');
    post('addpost', 'BlogController@addpost')->name('addpost');
})->middleware('auth');*/











/* ADMIN ROUTES

group(['as'=>'admin::', 'prefix'=>'admin'], function() {
    get('applications', 'ApplicationController@viewAll')->name('viewallapps');
})->middleware('auth');*/