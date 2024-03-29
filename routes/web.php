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
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('/auth/send-verification', 'Auth\RegisterController@sendVerification');
Route::get('/settings/profile', 'SettingsController@profile');
Route::get('/settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');

//Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
//  Route::resource('authors','AuthorsController');
//    });

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('authors','AuthorsController');
    Route::resource('books','BooksController');
    Route::resource('members', 'MembersController');
    Route::get('statistics', [
       'as' => 'statistics.index',
       'uses' => 'statisticsController@index'
    ]);
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