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

Route::get('todo/index', 'TodoController@index')->name('todo.index');
Route::get('todo/create', 'TodoController@create')->name('todo.create');
Route::post('todo/store', 'TodoController@store')->name('todo.store');
Route::get('todo/edit/{todo}', 'TodoController@edit')->name('todo.edit');
Route::post('todo/update/{todo}', 'TodoController@update')->name('todo.update');
Route::put('todo/complete/{todo}', 'TodoController@complete')->name('todo.complete');
Route::put('todo/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete');
