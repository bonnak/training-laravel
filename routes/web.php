<?php
Route::view('/', 'welcome')->middleware('auth');

Route::get('auth/login', 'AuthController@showLogin')->name('login')->middleware('guest');
Route::post('auth/login', 'AuthController@login')->middleware('guest');
Route::get('auth/logout', 'AuthController@logout')->name('logout')->middleware('auth');

// Allow only authenticated user.
Route::group([ 'middleware' => 'auth' ], function () {

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