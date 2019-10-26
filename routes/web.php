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

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Laratrust\LaratrustRegistersBladeDirectives;
use Maatwebsite\Excel\Readers\Html;
//use Symfony\Component\Routing\Route;


Route::get('/', 'HomeController@index');

Route::get('/about', 'MyController@showAbout');

Auth::routes();

Route::get('/test', ['middleware'=>'guest', 'uses'=>'MyController@showAbout']);

//Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
//  Route::resource('authors','AuthorsController');
//    });

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('authors', 'AuthorsController');
});

Route::get('/home', 'HomeController@index');
Route::get('/test', ['middleware'=>'guest', 'uses'=>'MyController@showAbout']);

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
    Route::resource('authors','AuthorsController');
    });

