<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Common routes
    Route::get('/', 'HomePageController@home')->name('home');
    Route::get('returnToSearchPage', 'HomePageController@returnToSearchPage')->name('returnToSearchPage');
    Route::get('search','SearchController@viewSearchPage')->name('search');
    Route::post('search','SearchController@viewSearchPage')->name('search');
    Route::post('categoryChange','SearchController@categoryChange')->name('categoryChange');
    Route::post('showClasses','ClassesController@showClasses')->name('showClasses');
    Route::post('saveComment','CommentController@saveComment')->name('saveComment');
    Route::get('view_profile','SearchController@viewProfile')->name('viewProfile');
    Route::post('loadComments','CommentController@loadComments')->name('loadComments');
//End common routes

//only for guests
    Route::group(['middleware' => 'guest', 'prefix' => ''], function () {
        Route::get('sign_up', 'UserController@signUpView')->name('signUp');
        Route::post('saveUser', 'UserController@saveUser')->name('saveUser');
        Route::get('login', 'UserController@login')->name('login');
        Route::post('authenticate', 'UserController@authenticate')->name('authenticate');
    });
//End guests routes

//Only for authenticated users
    Route::group(['middleware' => 'auth', 'prefix' => ''], function () {

        Route::post('logout','UserController@logout')->name('logout');//logout user

        Route::group(['middleware' => 'admin', 'prefix' => ''], function () {


            Route::get('adminViewComments','AdminCommentController@viewComments')->name('adminViewComments');
            Route::post('adminViewComments','AdminCommentController@viewComments')->name('adminViewComments');
            Route::post('deleteComment','AdminCommentController@deleteComment')->name('deleteComment');
            Route::post('unApproveComment','AdminCommentController@unApproveComment')->name('unApproveComment');
            Route::post('approveComment','AdminCommentController@approveComment')->name('approveComment');

        });

        Route::group(['middleware' => 'teacher', 'prefix' => ''], function () {

            //setting
            Route::get('add_category','SettingController@addCategory')->name('addCategory');
            Route::post('saveSubject','SettingController@saveSubject')->name('saveSubject');
            Route::post('saveCategory','SettingController@saveCategory')->name('saveCategory');
            Route::post('saveMapping','SettingController@saveMapping')->name('saveMapping');
            Route::post('loadCatAndSub','SettingController@loadCatAndSub')->name('loadCatAndSub');

            Route::get('my_profile','UserController@myProfile')->name('myProfile');
            Route::post('saveClass','ClassesController@saveClass')->name('saveClass');
            Route::post('saveDashBoard','UserController@saveDashBoard')->name('saveDashBoard');
            Route::post('saveContact','UserController@saveContact')->name('saveContact');
            Route::post('confirmName','UserController@confirmName')->name('confirmName');
            Route::post('confirmTag','UserController@confirmTag')->name('confirmTag');
            Route::post('submitImage','UserController@submitImage')->name('submitImage');
            Route::post('saveSocialMedia','UserController@saveSocialMedia')->name('saveSocialMedia');
            Route::post('categoryChange_profile','SearchController@categoryChange')->name('categoryChange_profile');
            Route::post('loadCommentsMy','CommentController@loadCommentsMy')->name('loadCommentsMy');

        });
    });
//End authenticated users


