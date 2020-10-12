<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'FrontController@home')->name('journal-front.home');
Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');

// Amdin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // File download
    Route::get('/download/menuscript/{file}', 'AdminController@download')->name('menuscript.download');

    // users
    Route::get('approved/users', 'AdminController@approvedUsers')->name('approved.uesrs');
    Route::get('mark/approved/users/{id}', 'AdminController@mark_approveUsers')->name('mark-approve.uesr');
    Route::get('pending/users', 'AdminController@pendingUsers')->name('pending.users');
    Route::get('mark/reject/users/{id}', 'AdminController@mark_rejectUsers')->name('mark-reject.users');
    Route::post('delete/user/{id}', 'AdminController@delete')->name('delete.user');
    Route::get('user/detail/{id}', 'AdminController@user_detail')->name('user.detail');


    Route::get('reviewers', 'AdminController@reviewers')->name('reviewers');
    Route::get('reviewer/teams', 'AdminController@reviewTeam')->name('reviewers.teams');
    Route::get('make/team', 'TeamController@makeTeam')->name('make.team');
    Route::post('store/team', 'TeamController@storeTeam')->name('store.team');

    // Admin Manuscript
    Route::get('mark/approved/menuscript/{id}', 'AdminController@mark_approveMenuscript')->name('mark-approve.menuscript');
    Route::get('mark/reject/menuscript/{id}', 'AdminController@mark_rejectMenuscript')->name('mark-reject.menuscript');
});
// Manuscript
Route::group(['prefix' => 'menuscript', 'as' => 'menuscript.', 'middleware' => 'auth'], function () {
    Route::get('create', 'MenuscriptController@create')->name('create');
    Route::post('store', 'MenuscriptController@store')->name('store');
    Route::get('pending/menuscript', 'MenuscriptController@menuscriptPending')->name('menuscript.pending');
    // Route::get('revision/menuscript', 'MenuscriptController@menuscriptRevision')->name('menuscript.revision');

    // Manuscript Category
    Route::get('category/list', 'CategoryController@index')->name('category');
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::post('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
});

Route::group(['prefix' => 'publisher', 'middleware' => 'auth'], function () {
    Route::get('approved/reviewers', 'PublisherController@approvedReviewer')->name('approved.reviewers');
    Route::get('pending/reviewers', 'PublisherController@pendingReviewer')->name('pending.reviewers');

    // Publisher Menuscript
    Route::get('pending/menuscript', 'PublisherController@pendingMenuscript')->name('pending.menuscript');
    Route::get('approved/menuscript', 'PublisherController@menuscriptApproved')->name('approved.menuscript');
    Route::get('revision/menuscript', 'PublisherController@menuscriptRevision')->name('revision.menuscript');
    Route::get('assign/menuscript/{id}', 'PublisherController@menuscriptAssignForm')->name('assign-form.menuscript');
    Route::post('assign/menuscript/{id}', 'PublisherController@menuscriptAssign')->name('assign.menuscript');
});

Auth::routes();