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


Route::get('/comment', 'CommentController@index')->name('comment');
Route::post('/comment/create/{blog_id}', 'CommentController@store')->name('comment.create');


Route::group([ 'prefix' => 'user' ], function () {
    Route::get('/', 'UserController@index');
    Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('edit/{id}', 'UserController@update');
});

Route::get('role', function () {
    $roles = App\Role::with('users')->get();

    return view('roles', compact('roles'));
});
