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

//DEFAULT HOME PAGE
Route::get('/', [
	'middleware' => ['auth'],
	'uses' => 'HomeController@getIndex',
	//'as' => 'home'
]);





Route::get('auth/logout','Auth\AuthController@getLogout');

/**
 *  Middleware "guest" meaning is that the user is already logged-in
 */
Route::group(['middleware' => 'guest'],function(){

	Route::get('auth','Auth\AuthController@getIndex');
	Route::post('auth/login','Auth\AuthController@postLogin');

	

});

/**
 *  Deafault Auth Group
 */
Route::group( ['middleware' => ['auth'] ],function(){
	//implicit controllers
	Route::controllers([
		//'auth' => 'Auth\AuthController',
		'home' => 'HomeController'
		//'password' => 'Auth\PasswordController',
	]);
});



/**
 *  RESTRICTED AREA GROUP
 */
Route::group( ['middleware' => ['auth','route.permission'] ],function(){


	Route::resource( 'user', 'User\UserController' );
	// /Route::post('user/{id}','UserController@update');
	// 
	// 
  


	Route::resource( 'role', 'User\RoleController' );
	Route::resource( 'access_level', 'User\AccessLevelController' );
    Route::resource( 'vendor', 'Vendor\VendorController' );
    Route::resource( 'product', 'Product\ProductController' );
    Route::resource( 'store', 'StoreController' );

    /**
     *  VENDOR DEFINED ROUTES
     */
    Route::post( 'vendor/{vendorId}/remove-products', [ 'uses' => 'Vendor\VendorController@removeProducts', 'as' => 'vendor.remove-products' ] );
	Route::get( 'vendor/{vendorId}/assign-products', [ 'uses' => 'Vendor\VendorController@assignProducts', 'as' => 'vendor.assign-products' ] );
   	Route::post( 'vendor/{vendorId}/assign-products/update', [ 'uses' => 'Vendor\VendorController@assignProductsUpdate', 'as' => 'vendor.assign-products.update' ] );
   	Route::post( 'vendor/{vendorId}/product-attribute/update', [ 'uses' => 'Vendor\VendorController@productAttributeUpdate', 'as' => 'vendor.product.attribute.update' ] );



    /**
     *  PRODUCT DEFINED ROUTES
     */
	Route::get('ajax-vendor-product/{vendorid}/{productid}', ['uses' => 'Product\AjaxProductController@getVendorProduct']); //no need to create route name
	Route::post('ajax-vendor-product-update', ['uses' => 'Product\AjaxProductController@getVendorProductUpdate']); //no need to create route name


} );


