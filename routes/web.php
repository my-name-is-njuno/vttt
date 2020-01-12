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

Route::resource('posts', 'PostController')->except('show')  ;
Route::get('posts/{slug}', 'PostController@show')->name('posts.show') ;

Route::resource('candidates', 'CandidateController')->except('show', 'create');
Route::get('candidates/{slug}', 'CandidateController@show')->name('candidates.show');
Route::get('candidates/nominate/yourself/for/{slug}', 'CandidateController@create')->name('candidates.self.nominate');

Route::resource('countries', 'CountryController')->except('show') ;
Route::get('countries/{slug}', 'CountryController@show')->name('countries.show') ;

Route::resource('comments', 'CommentController')->except('show') ;
Route::get('comments/{slug}', 'CommentController@show')->name('comments.show') ;

Route::resource('agendas', 'AgendaController')->except('show') ;
Route::get('agendas/{slug}', 'AgendaController@show')->name('agendas.show') ;

Route::resource('promises', 'PromiseController')->except('show') ;
Route::get('promises/{slug}', 'PromiseController@show')->name('promises.show') ;

Route::resource('candidatecomments', 'CandidatecommentController')  ;
