<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Auth::routes();

//User routes
Route::resource('users', 'Auth\UserManagerController');

Route::get('adminPanel/showUsers', 'Auth\UserManagerController@index')->name('showUsers')->middleware('admin'); //->middleware('admin') = voor aalleen admin

//Posts routes

Route::get('/', 'PostController@publicHomePage')->name('publicHomePage');   //main home page

Route::resource('posts', 'PostController');

Route::get('blog/view_gamesFromGenre/{labelGenre}', 'PostController@showGamesPosts')->name('view_gamesFromGenre');

Route::get('blog/searchPosts', 'PostController@searchPosts')->name('searchPosts');



Route::get('posts/adminPanel/{post}', 'PostController@switchStatusPost')->name('switchStatusPost');



//Comment routes

Route::resource('comments', 'CommentController');

Route::get('blog/view_comments', 'CommentController@allComments')->name('view_comments');

Route::get('blog/gameList', 'CommentController@viewAllGames')->name('gameList');

Route::get('/home', 'HomeController@index')->name('home');


