<?php

/* HOME ROUTE */
Route::get('/', 'PagesController@index')->name('home');
//Route::get('/', 'WelcomeController@show');
/*Route::get('home', function() {
    return redirect('/');
});*/
Route::group(['middleware'=>'auth'], function() {
    Route::get('home', 'WelcomeController@home');
});

/* JOIN ROUTE */
Route::get('join', 'PagesController@join')->name('join');

/* CONTACT ROUTES */
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@send')->name('sendContact');

/* LEGAL ROUTE*/
Route::get('legal', 'PagesController@legal')->name('legal');

/* APPLICATION ROUTES*/
Route::get('application/download', 'ApplicationController@downloadapp')->name('downloadapp');
Route::get('application', 'ApplicationController@index')->name('application');
Route::post('application', 'ApplicationController@save')->name('saveapp');

/* BLOG ROUTES*/
Route::get('news', 'BlogController@index')->name('blogindex');
Route::get('news/{slug}', 'BlogController@view')->name('blogpost');

/* MEMBER ROUTES*/
//Route::auth();

Route::group(['as'=>'member::', 'prefix'=>'member', 'middleware'=>'auth'], function() {
    Route::get('newpost', 'BlogController@newpost')->name('newpost');
    Route::post('addpost', 'BlogController@addpost')->name('addpost');
});

/* ADMIN ROUTES*/

Route::group(['as'=>'admin::', 'prefix'=>'admin', 'middleware'=>'admin'], function() {
    Route::get('applications', 'ApplicationController@viewAll')->name('viewallapps');
    Route::get('application/{application}/print', 'ApplicationController@printfilledapp')->name('filledapp');
    Route::get('application/{application}/approve', 'ApplicationController@approve')->name('approveapp');
    Route::get('application/{application}/deny', 'ApplicationController@deny')->name('denyapp');
    Route::get('application/{application}', 'ApplicationController@view')->name('viewapp');
});