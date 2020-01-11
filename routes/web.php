<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// usesr
Route::get('/user/{id}', 'UserController@show')->name('users.show');


// discussions
Route::resource('discussions', 'DiscussionController')->except('show') ;
Route::get('/discussions/{slug}', 'DiscussionController@show')->name('discussions.show');
Route::resource('posts', 'PostController') ;
Route::resource('candidates', 'CandidateController') ;
Route::resource('countries', 'CountryController') ;
Route::resource('comments', 'CommentController') ;
Route::resource('agendas', 'AgendaController') ;
Route::resource('promises', 'PromiseController') ;
Route::resource('comments', 'CommentController') ;
