<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'UsersController@show_listed_users');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('checklogin', 'LoginController@login');

//route to edit user details 
Route::get('edit_user/{id}', 'UsersController@select');

//route to update user details 
Route::get('update_details', 'UsersController@update');
