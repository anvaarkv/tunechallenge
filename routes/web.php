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
    return view('home');
});


Route::get('/test', 'UsersController@index')->name('users.test');
Route::get('/users', 'UsersController@index')->name('users.test');


//Route::prefix('/users')->middleware('auth')->group(function () {
//    Route::get('/', 'UsersController@index')->name('user.list');
//    Route::get('/{id?}', 'UsersController@index')->name('user.single');
//});

//Route::prefix('/stats')->group(function () {
//    Route::get('/users/{id?}', 'StatsController@users')->name('stats.users');
//    Route::get('/logs', 'StatsController@logs')->name('stats.logs');
//    Route::get('/metas/{id?}', 'StatsController@metas')->name('stats.metas');
//    Route::get('/conversationChart/{id?}', 'StatsController@conversationChart')->name('stats.conversationChart');
//
////    Route::get('/home', 'HomeController@index')->name('default');
////    Route::get('/dashboard', 'HomeController@index')->name('home.dashboard');
////    Route::get('/export/{param}', 'HomeController@export')->name('home.export');
////    Route::get('/dashboard-ajax-data-load', 'HomeController@dashboardAjaxDataLoad')->name('home.dashboardAjaxDataLoad');
////    Route::get('logout', 'Auth\LoginController@logout');
//});
