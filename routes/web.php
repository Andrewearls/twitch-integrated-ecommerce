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

Route::get('/', function() {
	return 'Homepage';
});

Auth::routes();

// Routes Shoppers Can Access
Route::namespace('Shopper')->group(function () {

	// Article Routes
	Route::prefix('articles')->group(function () {
		Route::get('/', 'ArticleDirectoryController@index')->name('directory');

		Route::get('/search/{categoryTitle}', 'SearchController@category')->name('search-category');
		Route::get('/search/user/{authorURL}', 'SearchController@author')->name('search-author');
		Route::get('/article/{url}', 'ArticleController@index')->name('article');
	});

	// Shopping Routes
	Route::prefix('shopping')->group(function () {

		// Cart Routes
		Route::prefix('cart')->group(function () {
			Route::get('/', 'CartController@index')->name('cart');
	
			// in the future make these post
			Route::get('/item/add', 'CartController@addItem');
			Route::get('/item/remove', 'CartController@removeItem');
			// in the future make these post
		});
		
	});



	

});

// Routes Logged in Users Can Access
Route::middleware(['auth',])->group(function () {

	// Routes Admin Can Access
	Route::namespace('Admin')->group(function () {

		// Dashboard Routes
		Route::prefix('dashboard')->group(function () {
			
			Route::get('/', 'DashboardController@index')->name('dashboard');

			// Routes For Blog Owner
			Route::get('/my/articles', 'DashboardController@userArticles')->name('user-articles');
			Route::get('/article/new', 'NewArticleController@index')->name('new-article');
			Route::post('/article/new', 'NewArticleController@create');
			Route::post('/category/new', 'CategoryController@create')->name('new-category');

			// Routes For Twitch Streamer
			Route::get('/twitch', 'TwitchController@index')->name('twitch');
			Route::post('/twitch', 'TwitchController@update');

			// Routes For Store Owner
			Route::get('/inventory', 'Search\ProductController@index')->name('inventory');
			// Product Routes
			Route::get('/product/new', 'ProductController@create')->name('product-create');
			Route::get('/product/edit/{id}', 'ProductController@edit')->name('product-edit');

			Route::get('/product/delete/{id}', 'ProductController@delete')->name('product-delete');
			Route::post('/product/update/{id?}', 'ProductController@update')->name('product-update');
			Route::get('/product/{id}/view', 'ProductController@index')->name('product');
		});	

		Route::get('/home', 'HomeController@index')->name('home');
	});	

	// Stripe Routes
	Route::get('/stripe/portal', 'StripeController@billingPortal')->name('stripe-portal');
	Route::get('/stripe', 'StripeController@index')->name('stripe-index');
	Route::get('/stripe/checkout', 'StripeController@checkout')->name('stripe-checkout');
	Route::post('/stripe/checkout', 'StripeController@processCheckout');
});

Route::namespace('SuperAdmin')->group(function () {
	// Routes SuperAdmin Can Access
});


