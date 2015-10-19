<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

//Route::resource( 'admin', 'Admin\AdminController' );




//implicit controllers
Route::controllers([
	'auth' => 'Auth\AuthController',
	'home' => 'HomeController'
	//'password' => 'Auth\PasswordController',
]);


Route::resource( 'user', 'UserController' );
// /Route::post('user/{id}','UserController@update');

Route::resource( 'vendor', 'VendorController' );