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

use Illuminate\Support\Facades\Route;

Auth::routes();
//Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/guest', 'GuestController@index');
Route::get('/about', 'MyController@showAbout');
Route::get('/test', ['middleware'=>'guest', 'uses'=>'MyController@showAbout']);

//Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
//  Route::resource('authors','AuthorsController');
//    });

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('authors','AuthorsController');
    Route::resource('books','BooksController');
 });

 Route::group(['prefix'=>'member', 'middleware'=>['auth', 'role:member']], function () {
    Route::resource('guests','GuestController');
 });

 Route::get('books/{book}/borrow', [
    'middleware' => ['auth', 'role:member'],
    'as' => 'guest.books.borrow',
    'uses' => 'BooksController@borrow'
]);

Route::put('books/{book}/return', [
   'middleware' => ['auth', 'role:member'],
   'as' => 'member.books.return',
   'uses' => 'BooksController@returnBack'
]);