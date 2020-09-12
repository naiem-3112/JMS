<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Route:: get('/front', 'FrontController@home')->name('journal-front.home');
Route:: get('/admin', 'FrontController@admin')->name('journal.admin');
Auth::routes();