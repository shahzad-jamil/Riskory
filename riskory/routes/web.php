<?php

use Illuminate\Support\Facades\App;
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

// Route::get('/admin/login',)


Route::get('/user','UserController@index')->name('user');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/admin/profile','AdminProfileController@index')->name('adminProfile');
Route::get('/admin/profile/edit','AdminProfileController@edit')->name('editAdminProfile');
Route::post('/admin/profile/update','AdminProfileController@update')->name('updateAdminProfile');
Route::get('/admin/account/edit','AdminProfileController@editAccount')->name('editAdminAccount');
Route::post('/admin/account/update','AdminProfileController@updateAccount')->name('updateAdminAccount');
Route::get('/admin/account/password/edit','AdminProfileController@editPassword')->name('editAdminPassword');
Route::post('/admin/account/password/update','AdminProfileController@updatePassword')->name('updateAdminPassword');


//Industries Routes
Route::resource('admin/industry', 'IndustryController');