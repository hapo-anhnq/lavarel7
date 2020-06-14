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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('users', 'UserController');
Route::resource('members', 'MemberController');

Route::get('user/password/change', 'ChangePasswordController@index')->name('password-change.index');;
Route::post('user/password/change', 'ChangePasswordController@store')->name('password.change');
