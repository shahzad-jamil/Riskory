<?php

use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify'=>true]);

// Route::get('/admin/login',)


Route::get('/dashboard','UserController@index')->name('user');
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

//Tag controller
Route::resource('admin/tag','TagController');

//Contact COntroller routes
Route::get('admin/contact','ContentController@contactIndex')->name('contact.index');
Route::delete('admin/contact/delete/{id}','ContentController@destroyContact')->name('contact.destroy');

//Contributor routes
Route::get('admin/contributors','AdminController@allContributors')->name('contributor.index');
Route::get('admin/contributor/{id}','AdminController@viewContributor')->name('contributor.view');

Route::get('admin/riskcontrols','AdminRiskControlController@index')->name('admin.allRiskControls');



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

Route::get('/login/twitter','Auth\LoginController@twitterRedirectToProvider')->name('twitterLogin');
Route::get('/login/twitter/callback','Auth\LoginController@twitterProviderCallback');


//Contributor side User



//Route::get('/dashboard/view','UserController@dashboard')->name('dashboard');

Route::get('/more/{req}','UserController@seeMore')->name('seeMore');

Route::get('/user/profile','UserController@userProfile')->name('userProfile');
Route::get('/user/edit/profile','UserController@editProfile')->name('editProfile');
Route::post('/user/edit/profile','UserController@updateProfile')->name('updateProfile');
Route::post('/user/upload/avatar','UserController@uploadAvatar')->name('uploadAvatar');
Route::post('/user/upload/cover','UserController@uploadCover')->name('uploadCover');



//Control Custom routes

Route::get('/admin/control/{type}','ControlController@index')->name('control.index');
Route::get('/admin/control/{type}/create','ControlController@create')->name('control.create');
Route::post('/admin/control/{type}/create','ControlController@store')->name('control.store');
Route::get('/admin/control/{type}/{id}','ControlController@show')->name('control.show');
Route::get('/admin/control/{type}/edit/{id}','ControlController@edit')->name('control.edit');
Route::put('/admin/control/{type}/edit/{id}','ControlController@update')->name('control.update');
Route::delete('/admin/control/{type}/destroy/{id}','ControlController@destroy')->name('control.destroy');

//Control Follow Route
Route::get('/control/{control}/follow','FollowController@followControl')->name('control.follow');
Route::delete('/control/{control}/unfollow','FollowController@unfollowControl')->name('control.unfollow');
// Tag Follow unfollow route

Route::get('/tag/{tag}/follow','FollowController@followTag')->name('tag.follow');
Route::delete('/tag/{tag}/unfollow','FollowController@unfollowTag')->name('tag.unfollow');

//Risk control User side
Route::get('/rc/create','RiskController@create')->name('rc.create');
Route::post('/rc/create','RiskController@store')->name('rc.store');
Route::get('/rc/show/{slug}','RiskController@show')->name('rc.show');
Route::get('rc/{riskcontrol}/edit','RiskController@edit')->name('rc.edit');
Route::put('rc/{riskcontrol}/edit','RiskController@update')->name('rc.update');

//All risk controls feed
Route::get('/riskcontrols','RiskController@viewAll')->name('rc.all');
Route::get('rc/{slug}','RiskController@viewSpecific')->name('rc.view');

//Riskcontrol bookmark unbookmark

Route::get('rc/bookmark/{riskControl}','RcActionControllers@bookmark')->name('rc.bookmark');
Route::delete('rc/unbookmark/{riskControl}','RcActionControllers@unbookmark')->name('rc.unbookmark');
Route::get('rc/all/bookmarks','RcActionControllers@allBookmarks')->name('rc.bookmarks');

//Riskcontrol like dislike 
Route::get('rc/like/{riskControl}','RcActionControllers@like')->name('rc.like');
Route::delete('rc/unlike/{riskControl}','RcActionControllers@unlike')->name('rc.unlike');
Route::get('rc/dislike/{riskControl}','RcActionControllers@dislike')->name('rc.dislike');
Route::delete('rc/undislike/{riskControl}','RcActionControllers@undislike')->name('rc.undislike');

Route::get('riskcontrols/{control}','UserController@byControl')->name('byControl');
Route::get('riskcontrols/{tag}/tag','UserController@byTag')->name('byTag');


//Ajax
Route::post('user/bookmarks/fetch/{user}', 'UserController@fetchBookmarks')->name('bookmarks.fetch');
Route::post('user/riskcontrols/fetch/{user}', 'UserController@fetchRiskcontrols')->name('riskcontrols.fetch');
Route::post('user/likes/fetch/{user}', 'UserController@fetchLikes')->name('likes.fetch');

Route::post('user/dislikes/fetch/{user}', 'UserController@fetchDislikes')->name('dislikes.fetch');

Route::post('rc/fetch/all/request', 'RiskController@fetchAllRcs')->name('rc.fetch.all');
Route::post('relation/bookmark/fetch','RiskController@fetchBookmarks')->name('relation.bookmarks.fetch');
Route::post('edit/relation/bookmark/fetch','RiskController@fetchBookmarksEdit')->name('edit.relation.bookmarks.fetch');


//Benchmark
Route::get('riskcontrol/add/{riskcontrol}/benchmark','BenchmarkController@create')->name('add.benchmark');
Route::post('riskcontrol/add/{riskcontrol}/benchmark','BenchmarkController@store')->name('store.benchmark');

//Comments
Route::post('comment/{riskcontrol}/create','RiskController@createComment')->name('create.comment');
Route::delete('comment/{comment}/delete/{rc}','RiskController@deleteComment')->name('comment.delete');

//Lists

Route::get('all/lists','ListController@index')->name('all.lists');


Route::get('user/profile/{user}','UserController@visitProfile')->name('visit.profile');
Route::get('user/network','UserController@userNetwork')->name('user.network');
//Follow user
Route::get('follow/{user}/user','FollowController@followUser')->name('follow.user');
Route::delete('unfollow/{user}/user','FollowController@unfollowUser')->name('user.unfollow');

Route::get('user/all/notifications','NotificationController@index')->name('user.notifications');
Route::post('list/create','ListController@create')->name('add.list');
Route::get('list/get/all','ListController@getAllLists')->name('get.all.lists');
Route::delete('list/delete','ListController@deleteList')->name('delete.list');


Route::post('fetch/user/lists','ListController@fetchUserLists')->name('fetch.user.lists');
Route::post('add/riskcontrol/to/list','ListController@addRcToList')->name('add.rc.to.list');