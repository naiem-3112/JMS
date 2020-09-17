<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontController@home')->name('journal-front.home');

Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {

    // File download
    Route::get('/download/menuscript/{file}', 'AdminController@download')->name('menuscript.download');

    // users
    Route::get('approved/users', 'AdminController@approvedUsers')->name('approved.uesrs');
    Route::get('mark/approved/users/{id}', 'AdminController@mark_approveUsers')->name('mark-approve.uesr');
    Route::get('pending/users', 'AdminController@pendingUsers')->name('pending.users');
    Route::get('mark/reject/users/{id}', 'AdminController@mark_rejectUsers')->name('mark-reject.users');
    Route::post('delete/user/{id}', 'AdminController@delete')->name('delete.user');
    Route::get('user/detail/{id}', 'AdminController@user_detail')->name('user.detail');


    // Manuscript
    Route::get('new/menuscript', 'AdminController@menuscriptNew')->name('menuscript.new');
    Route::get('approved/menuscript', 'AdminController@menuscriptApproved')->name('menuscript.approved');
    Route::get('revision/menuscript', 'AdminController@menuscriptRevision')->name('menuscript.revision');
    Route::get('mark/approved/menuscript/{id}', 'AdminController@mark_approveMenuscript')->name('mark-approve.menuscript');
    Route::get('mark/reject/menuscript/{id}', 'AdminController@mark_rejectMenuscript')->name('mark-reject.menuscript');
});


Route::group(['prefix' => 'publisher', 'as' => 'publisher.', 'middleware' => 'auth'], function() {
    Route::get('create', 'PublisherController@create')->name('create');
    Route::post('store', 'PublisherController@store')->name('store');

    // menuscript
    Route::get('pending/menuscript', 'PublisherController@menuscriptPending')->name('menuscript.pending');
    Route::get('revision/menuscript', 'PublisherController@menuscriptRevision')->name('menuscript.revision');


});



Auth::routes();