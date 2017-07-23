<?php

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

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('staff')->group(function() {
  Route::get('/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
  Route::post('/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');
  Route::get('/', 'StaffController@index')->name('staff.dashboard');
  Route::get('/logout', 'Auth\StaffLoginController@logout')->name('staff.logout');
});
