<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/stats')->group(function () {
    Route::get('/users/{id?}', 'StatsController@users')->name('stats.users');
    Route::get('/logs', 'StatsController@logs')->name('stats.logs');
    Route::get('/metas/{id?}', 'StatsController@metas')->name('stats.metas');
    Route::get('/conversationChart/{id?}', 'StatsController@conversationChart')->name('stats.conversationChart');

//    Route::get('/home', 'HomeController@index')->name('default');
//    Route::get('/dashboard', 'HomeController@index')->name('home.dashboard');
//    Route::get('/export/{param}', 'HomeController@export')->name('home.export');
//    Route::get('/dashboard-ajax-data-load', 'HomeController@dashboardAjaxDataLoad')->name('home.dashboardAjaxDataLoad');
//    Route::get('logout', 'Auth\LoginController@logout');
});
