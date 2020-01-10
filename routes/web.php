<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// usesr
Route::get('/user/{id}', 'UserController@show')->name('users.show');


// discussions
Route::resource('discussions', 'DiscussionController')->except('show') ;
Route::get('/discussions/{slug}', 'DiscussionController@show')->name('discussions.show');
