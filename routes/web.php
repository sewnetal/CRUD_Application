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

Route::get('/',                             'PostsController@index')->name('home');
Route::get('/home',                         'PostsController@index')->name('home');
Route::get('/posts/create',                 'PostsController@create');
Route::post('/posts',                       'PostsController@store');
Route::get('/posts/{posts}',                'PostsController@show');
Route::get('/posts/{posts}/edit',           'PostsController@edit');
Route::PUT('/posts/{posts}/update',         'PostsController@update');
Route::DELETE('/posts/{posts}/destroy',     'PostsController@destroy');


Route::post('/posts/{posts}/comment',       'CommentsController@store');


Auth::routes();

Route::get('/{user}/edit',                      'EdituserController@edit');
Route::PUT('/{user}/update',                    'EdituserController@update');
Route::DELETE('/{user}/destroy',                'EdituserController@destroy');


