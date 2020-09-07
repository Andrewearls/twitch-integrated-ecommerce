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

Route::middleware(['web'])->group(function () {
	Route::get('/', 'ArticleDirectoryController@index')->name('directory');;
	Route::get('/search/{categoryTitle}', 'SearchController@category')->name('search-category');
	Route::get('/search/user/{authorURL}', 'SearchController@author')->name('search-author');
	Route::get('/article/{url}', 'ArticleController@index')->name('article');

	Route::get('/shopping/cart', 'CartController@index')->name('cart');
	
	// in the future make these post
	Route::get('/shopping/cart/item/add', 'CartController@addItem');
	Route::get('/shopping/cart/item/remove', 'CartController@removeItem');
	// in the future make these post

	Auth::routes();

	Route::middleware(['auth'])->group(function () {
		Route::get('/stripe/portal', 'StripeController@billingPortal')->name('stripe-portal');
		Route::get('/stripe', 'StripeController@index')->name('stripe-index');
		Route::get('/stripe/checkout', 'StripeController@checkout')->name('stripe-checkout');
		Route::post('/stripe/checkout', 'StripeController@processCheckout');

		// product routes
		Route::get('/product/{id}', 'ProductController@index')->name('product');
		Route::get('/product/new', 'ProductController@create')->name('product-create');
		Route::get('/product/edit/{$id}', 'ProductController@edit')->name('product-edit');
		Route::get('/product/delete/{$id}', 'ProductController@delete')->name('product-delete');
		Route::post('/product/update/{id?}', 'ProductController@update')->name('product-update');
		// product routes

		Route::middleware(['role:author',])->group(function () {
			Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
			Route::get('/dashboard/my/articles', 'DashboardController@userArticles')->name('user-articles');
			Route::get('/dashboard/article/new', 'NewArticleController@index')->name('new-article');
			Route::post('/dashboard/article/new', 'NewArticleController@create');
			Route::post('/dashboard/category/new', 'CategoryController@create')->name('new-category');
			Route::get('/dashboard/twitch', 'TwitchController@index')->name('twitch');
			Route::post('/dashboard/twitch', 'TwitchController@update');
		});
	});


	Route::get('/home', 'HomeController@index')->name('home');
});


