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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::domain('{team-slug}.' . env('APP_URL'))->group(function () {

	// Routes Shoppers Can Access
	Route::namespace('Shopper')->group(function () {

		// Article Routes
		Route::prefix('articles')->group(function () {
			Route::get('/', 'ArticleDirectoryController@index')->name('directory');

			Route::get('/search/{categoryTitle}', 'SearchController@category')->name('search-category');
			Route::get('/search/user/{authorURL}', 'SearchController@author')->name('search-author');
			Route::get('/article/{article}', 'ArticleController@index')->name('article');
		});

		// Shopping Routes
		Route::prefix('shopping')->group(function () {

			// Store routes
			Route::get('/', 'ShoppingController@index')->name('shopping');

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

});

// Routes Logged in Users Can Access
Route::middleware(['auth',])->group(function () {

	// Dashboard Routes
	Route::prefix('dashboard')->group(function () {

		// Routes Admin Can Access
		Route::namespace('Admin')->group(function () {

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
			Route::prefix('store')->group(function () {

				// Store Searching Routes
				Route::namespace('Search')->group(function () {
					Route::get('/', 'StoreController@index')->name('store-list');
					Route::get('/inventory', 'ProductController@index')->name('inventory');
				});

				Route::get('/new', 'StoreController@create')->name('store-new');
				Route::get('/edit', 'StoreController@edit')->name('store-edit');
				Route::post('/update/{store?}', 'StoreController@update')->name('store-update');


				// Product Routes
				Route::prefix('product')->group(function () {
					Route::get('/new', 'ProductController@create')->name('product-create');
					Route::get('/edit/{product}', 'ProductController@edit')->name('product-edit');

					Route::get('/delete/{product}', 'ProductController@delete')->name('product-delete');
					Route::post('/update/{product?}', 'ProductController@update')->name('product-update');
					Route::get('/{product}/view', 'ProductController@index')->name('product');
				});
			});
		});	

		/**
		 * Teamwork routes
		 */
		Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
		{		
			Route::prefix('resources')->group(function () {
				Route::get('/', 'TeamResourceController@currentResources')->name('resources');
				Route::get('/add', 'TeamResourceController@availableResources')->name('new-resource');
			});
		    
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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
