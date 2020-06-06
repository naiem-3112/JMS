<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload', 'UserController@upload_avatar');

Auth::routes();

Route::get('todo/index', 'TodoController@index')->name('index');
Route::get('todo/create', 'TodoController@create')->name('create');
Route::post('todo/store', 'TodoController@store')->name('store');
Route::get('todo/edit', 'TodoController@edit')->name('edit');
Route::post('todo/update', 'TodoController@update')->name('update');
