<?php
Route::view('/', 'welcome');

Route::get('auth/login', 'AuthController@showLogin')->name('login')->middleware('guest');
Route::post('auth/login', 'AuthController@login')->middleware('guest');
Route::get('auth/logout', 'AuthController@logout')->name('logout')->middleware('auth');

// Allow only authenticated user.
Route::group([ 'middleware' => 'auth' ], function () {

    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/create', 'PostController@store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::put('/post/edit/{id}', 'PostController@update');
    Route::delete('/post/{id}', 'PostController@destroy')->name('post.delete');
    Route::get('/post/{id}', 'PostController@show')->name('post.show');


    Route::get('/comment', 'CommentController@index')->name('comment');
    Route::post('/comment/create/{post_id}', 'CommentController@store')->name('comment.create');


    Route::group([ 'prefix' => 'user' ], function () {
        Route::get('/', 'UserController@index')->name('user');
        Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('edit/{id}', 'UserController@update');
    });

    Route::get('role', function () {
        $roles = App\Role::with('users')->get();

        return view('roles', compact('roles'));
    })->name('role');
});


Route::get( 'admin' , function () {
    return 'admin';
})->middleware('admin-auth');

Route::get( 'admin/login' , function () {
    return 'admin login';
});