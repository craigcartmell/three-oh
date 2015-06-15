<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return redirect()->route('blog');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', ['uses' => 'ArticleController@index', 'as' => 'blog']);
    Route::get('{published_at}/{slug}', ['uses' => 'ArticleController@getBySlug', 'as' => 'blog.article']);
});

Route::get('/contact', ['uses' => 'ContactController@getContact', 'as' => 'contact']);
Route::post('/contact', ['uses' => 'ContactController@postContact', 'as' => 'contact']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'AdminController@index']);
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/{id}', ['uses' => 'ArticleController@getEdit']);
        Route::post('/{id}', ['uses' => 'ArticleController@postEdit']);
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', ['uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', 'Auth\AuthController@getLogout');
});

