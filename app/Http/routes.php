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


Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('articles','ArticlesController');
/*
Route::get('upload', 'ImagesController@index');
Route::post('upload', 'ImagesController@upload');*/

Route::get('upload', 'ImageController@upload' );
Route::post('upload', 'ImageController@store' );
Route::get('show', 'ImageController@show' );
//named route
/*Route::get('upload', array('as' => 'upload', 'uses' => 'ImageController@upload' ));*/