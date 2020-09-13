<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route:: get('/front', 'FrontController@home')->name('journal-front.home');


Route::group(['prefix' => 'publisher', 'as' => 'publisher.', 'middleware' => 'auth'], function() {
    Route::get('create', 'PublisherController@create')->name('create');
    Route::post('store', 'PublisherController@store')->name('store');
});

Auth::routes();