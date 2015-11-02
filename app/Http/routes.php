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

//DEFAULT PAGE
Route::get('/', [
	'middleware' => 'auth',
	'uses' => 'HomeController@getIndex'
]);



/**
 *  Middleware "guest" meaning is that the user is already logged-in
 */
Route::group(['middleware' => 'guest'],function(){

	Route::get('auth','Auth\AuthController@getIndex');
	Route::post('auth/login','Auth\AuthController@postLogin');

});

	

/**
 *  RESTRICTED AREA GROUP
 */
Route::group( ['middleware' => 'auth'],function(){


	Route::get('auth/logout','Auth\AuthController@getLogout');

	//implicit controllers
	Route::controllers([
		//'auth' => 'Auth\AuthController',
		'home' => 'HomeController'
		//'password' => 'Auth\PasswordController',
	]);


	Route::resource( 'user', 'UserController' );
	// /Route::post('user/{id}','UserController@update');


	Route::resource( 'role', 'RoleController' );
	Route::resource( 'access_level', 'AccessLevelController' );



} );

Route::resource( 'role', 'RoleController' );
Route::resource( 'access_level', 'AccessLevelController' );
Route::resource( 'vendor', 'VendorController' );
Route::resource( 'product', 'ProductController' );
Route::resource( 'location', 'LocationController' );

