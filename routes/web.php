<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontController@home')->name('journal-front.home');

Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {

    Route::get('approved/users', 'AdminController@approvedUsers')->name('approved.uesrs');
    Route::get('mark/approved/users/{id}', 'AdminController@mark_approveUsers')->name('mark-approve.uesr');
    Route::get('pending/users', 'AdminController@pendingUsers')->name('pending.users');
    Route::get('mark/reject/users/{id}', 'AdminController@mark_rejectUsers')->name('mark-reject.users');
    Route::post('delete/user/{id}', 'AdminController@delete')->name('delete.user');

    // Manuscript
    Route::get('menuscript/new', 'AdminController@menuscriptNew')->name('menuscript.new');
    Route::get('menuscript/approved', 'AdminController@menuscriptApproved')->name('menuscript.approved');
    Route::get('menuscript/revision', 'AdminController@menuscriptRevision')->name('menuscript.revision');
    Route::get('mark/approved/menuscript/{id}', 'AdminController@mark_approveMenuscript')->name('mark-approve.menuscript');
    Route::get('mark/reject/menuscript/{id}', 'AdminController@mark_rejectMenuscript')->name('mark-reject.menuscript');
});


Route::group(['prefix' => 'publisher', 'as' => 'publisher.', 'middleware' => 'auth'], function() {
    Route::get('create', 'PublisherController@create')->name('create');
    Route::post('store', 'PublisherController@store')->name('store');
});

Auth::routes();