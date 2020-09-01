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
Route::group(['namespace'=>'front'],function(){

    Route::get('/','UserController@dashboard');
    Route::match(['get','post'],'/register','UserController@register');
    Route::match(['get','post'],'/login','UserController@login');
    Route::match(['get','post'],'/check-email','UserController@checkEmail');
    Route::get('/logout','UserController@logout');

Route::group(['middleware'=>'FrontUser'],function (){
        Route::match(['get','post'],'/account','UserController@account');
    });
});
