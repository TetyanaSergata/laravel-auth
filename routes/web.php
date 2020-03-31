<?php

use Illuminate\Support\Facades\Route;

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
    return view('guest.welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Una nuova rotta al post
Route::get('/posts', 'PostController@index')->name('posts.index');
// Rotta alla Show
Route::get('/posts{slug}', 'PostController@show')->name('posts.show');

// Laravel Authentication
Route::name('admin.')
      ->prefix('admin')
      ->namespace('Admin')
      ->middleware('auth')
      ->group(function () {
          Route::get('/home', 'HomeController@index')
          ->name('home');

          Route::resource('posts','PostController');
      });
