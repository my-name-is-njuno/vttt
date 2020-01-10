<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// usesr
Route::get('/user/{id}', 'UserController@show')->name('users.show');


// discussions
Route::resource('discussions', 'DiscussionController') ;