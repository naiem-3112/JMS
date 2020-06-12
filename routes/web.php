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
Route::resource('todo', 'TodoController');
Route::put('todo/complete/{todo}', 'TodoController@complete')->name('todo.complete');
Route::delete('todo/incomplete/{todo}', 'TodoController@incomplete')->name('todo.incomplete');

