<?php

auth()->login(App\User::find(1), true);
Route::get('/', function() { return auth()->user(); });



Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::post('/blog/create', 'BlogController@store');
Route::get('/blog/edit/{id}', 'BlogController@edit')->name('blog.edit');
Route::put('/blog/edit/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy')->name('blog.delete');
Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');
