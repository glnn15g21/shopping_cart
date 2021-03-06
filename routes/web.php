<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
	'uses' => 'ProductsController@getIndex',
	'as'   => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductsController@getAddToCart',
	'as'   => 'product.addToCart'
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductsController@getShoppingCart',
	'as'   => 'shop.shoppingCart'
]);

Route::get('/checkout', [
	'uses' => 'ProductsController@getCheckout',
	'as'   => 'checkout'
]);

Route::post('/checkout', [
	'uses' => 'ProductsController@postCheckout',
	'as'   => 'checkout'
]);

Route::group(['prefix' => 'user'],function(){
	Route::group(['middleware' =>'guest'],function(){
		Route::get('/signup', [
			'uses' => 'UserController@getSignup',
			'as'   => 'user.signup'
		]);

		Route::post('/signup', [
			'uses' => 'UserController@postSignup',
			'as'   => 'user.signup'
		]);

		Route::get('/signin', [
			'uses' => 'UserController@getSignin',
			'as'   => 'user.signin'
		]);

		Route::post('/signin', [
			'uses' => 'UserController@postSignin',
			'as'   => 'user.signin'
		]);
	});
	
	Route::group(['middleware' =>'auth'],function(){
		Route::get('/profile', [
			'uses' => 'UserController@getProfile',
			'as'   => 'user.profile'
		]);

		Route::get('/logout', [
			'uses' => 'UserController@getLogout',
			'as'   => 'user.logout'
		]);
	});	
});

