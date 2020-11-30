<?php

use App\Http\Controllers\VisitorController;
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
    return view('user.homepage');
})->name('homePage');

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
Route::get('/admin/profile/avatar','AdminProfileController@editAvatar')->name('admin.edit.avatar');
Route::post('/admin/profile/avatar','AdminProfileController@uploadAvatar')->name('admin.upload.avatar');


//Industries Routes
Route::resource('admin/industry', 'IndustryController');

//Business processes routes
Route::resource('admin/bprocess','BprocessController');

//Business process routes
Route::resource('admin/bframework','BframeworkController');

//Category routes
Route::resource('admin/category','CategoryController');

//Content controller
Route::resource('admin/content','ContentController');

//Contact COntroller routes
Route::get('admin/contact','ContentController@contactIndex')->name('contact.index');
Route::delete('admin/contact/delete/{id}','ContentController@destroyContact')->name('contact.destroy');

//Contributor routes
Route::get('admin/contributors','AdminController@allContributors')->name('contributor.index');
Route::get('admin/contributor/{id}','AdminController@viewContributor')->name('contributor.view');



//Auth routes
Route::get('/admin/login','Auth\LoginController@showLoginForm')->name('adminLogin');
Route::get('/register','VisitorController@signup')->name('userRegister');
Route::post('/register','VisitorController@register')->name('userRegister');
Route::get('/login','VisitorController@loginForm')->name('userLogin');

//Visitor Routes
Route::get('/about-us','VisitorController@about')->name('aboutUs');
Route::get('/contact','VisitorController@contact')->name('contactUs');

Route::post('/contact/submit', 'VisitorController@submission')->name('submission');
Route::get('/reload-captcha', 'VisitorController@reloadCaptcha');

//Sociallite logins

Route::get('/login/facebook','Auth\LoginController@facebookRedirectToProvider')->name('facebookLogin');
Route::get('/login/facebook/callback','Auth\LoginController@facebookProviderCallback')->name('facebookCallback');

Route::get('/login/google','Auth\LoginController@googleRedirectToProvider')->name('googleLogin');
Route::get('/login/google/callback','Auth\LoginController@googleProviderCallback');


//Contributor side User



//Route::get('/dashboard/view','UserController@dashboard')->name('dashboard');

Route::get('/more/{req}','UserController@seeMore')->name('seeMore');

Route::get('/user/profile','UserController@userProfile')->name('userProfile');