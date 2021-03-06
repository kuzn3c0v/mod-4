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


Route::get('/', 'IndexController@index');

Route::get('news/{cat}', 'NewsController@newsByCat')->name('newsByCat');

Route::get('show/{id}', 'NewsController@oneNews')->name('oneNews');

Route::get('news/tags/{id}', 'NewsController@newsByTag')->name('newsByTag');

Route::post('news/viewed', 'NewsController@viewed');

Route::post('search', 'SearchController@searchBar');

Route::post('comment', 'CommentsController@post')->name('postComment');

Auth::routes();
