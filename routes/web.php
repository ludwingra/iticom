<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('admin.layout');
});

Route::get('home', 'HomeController@index')->name('dashboard');

Route::group(
    [
        'prefix'     => 'admin',
        'namespace'  => 'Admin',
        'middleware' => 'auth'
    ],
    function(){
        // user
        Route::get('users', 'AdminUserController@index')->name('user.index');
        Route::get('users/create', 'AdminUserController@create')->name('user.create');
        Route::get('users/{id}', 'AdminUserController@show')->name('user.show');
        Route::post('users/create', 'AdminUserController@store')->name('user.store');
        Route::get('users/edit/{id}', 'AdminUserController@edit')->name('user.edit');
        Route::put('users/edit/{id}', 'AdminUserController@update')->name('user.update');
        Route::delete('users/{id}', 'AdminUserController@destroy')->name('user.delete');

    }
);

Route::auth();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');