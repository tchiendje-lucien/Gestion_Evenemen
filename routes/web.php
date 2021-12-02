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
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\Auth\LoginController@__construct');

//User route
Route::get('/create-event', 'App\Http\Controllers\EventController@create_event');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@create_register');
Route::post('/create_user', 'App\Http\Controllers\Auth\RegisterController@create_user');
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@create_login');
Route::post('/login_user', 'App\Http\Controllers\Auth\LoginController@login_user');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/my-profile', 'App\Http\Controllers\UserController@create_profile')->name('my-profile');
Route::post('/update_user_profile', 'App\Http\Controllers\UserController@update_user_profile')->name('update_user_profile');

//Events routes
Route::get('/create-event', 'App\Http\Controllers\EventController@create_event');
Route::get('/my-agenda', 'App\Http\Controllers\EventController@create_agenda');
Route::get('/edit-event', 'App\Http\Controllers\EventController@create_agenda');
Route::get('evenement/{id}', 'App\Http\Controllers\EventController@edit_event');
Route::post('/store_event', 'App\Http\Controllers\EventController@store_event');
Route::post('update_event/{id}', 'App\Http\Controllers\EventController@update_event')->name('update_event');
Route::get('delete_event/{id}', 'App\Http\Controllers\EventController@delete_event')->name('delete_event');
Route::get('active_event/{id}', 'App\Http\Controllers\EventController@active_event')->name('active_event');

//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
