<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

<<<<<<< HEAD
Route::get('/', 'HomeController@index');
=======
Route::get('/', function () {
    return view('authors.index');
});
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
Route::get('/about', 'MyController@showAbout');

Auth::routes();

<<<<<<< HEAD

Route::get('/test', ['middleware'=>'guest', 'uses'=>'MyController@showAbout']);

//Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
//  Route::resource('authors','AuthorsController');
//    });

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('authors', 'AuthorsController');
=======
Route::get('/home', 'HomeController@index');
Route::get('/test', ['middleware'=>'guest', 'uses'=>'MyController@showAbout']);

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
    Route::resource('authors','AuthorsController');
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
    });
