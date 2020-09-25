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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'es'], function () {
    Route::group(['prefix'=>'user'], function () {
        Route::any('create_table', "Elasticsearch\UserController@createTable");
        Route::get('search', "Elasticsearch\UserController@search");
        Route::any('add', "Elasticsearch\UserController@add");
    });
});


Route::group(['prefix'=>'queue'], function () {
    Route::group(['prefix'=>'redis'], function () {
        Route::get('publish', 'Queue\RedisController@publish')->name('redis.publish');
    });
});

Route::group(['prefix'=>'php'], function () {
    Route::group(['prefix'=>'user'], function () {
        Route::get('/', 'Php\UserController@index')->name('php.user.index');
    });
});

