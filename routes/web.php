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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'ThreadController@index')->name('forumHome');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/thread', 'ThreadController');
Route::resource('/reply', 'ReplyController');
Route::put('/reply/solution/{threadID}/{replyID}', 'ReplyController@makeReplySolution')->name('reply.makeReplySolution');