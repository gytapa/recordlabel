<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    //Artist methods
    Route::get('/artist','API\ArtistController@getAll');
    Route::get('/artist/{id}','API\ArtistController@get');
    Route::put('/artist/{id}','API\ArtistController@put');
    Route::post('/artist','API\ArtistController@post');
    Route::delete('/artist/{id}','API\ArtistController@delete');
    //Album methods
    Route::get('/album','API\AlbumController@getAll');
    Route::get('/album/{id}','API\AlbumController@get');
    Route::put('/album/{id}','API\AlbumController@put');
    Route::post('/album/','API\AlbumController@post');
    Route::delete('/album/{id}','API\AlbumController@delete');
    //Song methods
    Route::get('/song','API\SongController@getAll');
    Route::get('/song/{id}','API\SongController@get');
    Route::put('/song/{id}','API\SongController@put');
    Route::post('/song','API\SongController@post');
    Route::delete('/song/{id}','API\SongController@delete');
});


//Studio methods
Route::get('/studio','API\StudioController@getAll');
Route::get('/studio/{id}','API\StudioController@get');
Route::put('/studio/{id}','API\StudioController@put');
Route::post('/studio','API\StudioController@post');
Route::delete('/studio/{id}','API\StudioController@delete');
