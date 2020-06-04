<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('user', 'UserController@index');

Route::get('logout', function () {
    auth()->logout();
    return redirect()->to('/');
});

Route::get('home', function () {
    $user = auth()->user();
    return 'welcome back  ' . $user->name;
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
