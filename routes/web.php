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

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Route::domain('{teamSlug}.' . env('APP_URL'))->middleware('team.parameter.defaults')->group(function () {
	Route::namespace('Audience')->group(function () {

		Route::get('/', 'Controller@index')->name('public-home');

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

				// Product Routes
				Route::get('product/{id}/description', 'ProductPreviewController@index')->name('product-preview');

				// Cart Routes
				Route::prefix('cart')->group(function () {
					Route::get('/', 'CartController@index')->name('cart');
			
					// in the future make these post
					Route::get('/item/add/{productId}', 'CartController@addItem')->name('cart.item.add');
					Route::get('/item/remove/{itemId}', 'CartController@removeItem')->name('cart.item.remove');
					// in the future make these post
				});

				// Orders Routes
				// Route::get('/orders', 'OrderController@index')->name('my-orders');

			});	

		});
	});

	// Routes Logged in Users Can Access
	Route::middleware(['auth', 'can:view dashboard'])->group(function () {

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
					Route::post('/update', 'StoreController@update')->name('store-update');

					// Stripe Routes For Owner
					Route::prefix('stripe')->group(function () {
						Route::get('/account/create', 'StripeAccountController@create')->name('stripe-account-create');
						Route::get('/account/pending', 'StripeAccountController@pending')->name('stripe-account-pending');
						Route::get('/account/create/callback', 'StripeAccountController@createCallback')->name('stripe-account-create-callback');
					});
					

					// Product Routes
					Route::prefix('product')->group(function () {
						Route::get('/new', 'ProductController@create')->name('product-create');
						Route::get('/edit/{product}', 'ProductController@edit')->name('product-edit');

						Route::get('/delete/{product}', 'ProductController@delete')->name('product-delete');
						Route::post('/update/{product?}', 'ProductController@update')->name('product-update');
						Route::get('/{product}/view', 'ProductController@index')->name('product');
					});

					// Orders
					Route::prefix('orders')->group(function () {
						Route::get('/', 'OrderController@index')->name('store-orders');
					});
				});
			});	

			/**
			 * Teamwork routes
			 */
			Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
			{
			    Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
			    Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
			    Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
			    Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
			    Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
			    Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
			    Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

			    Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
			    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
			    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
			    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

			    Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
			
				Route::prefix('resources')->group(function () {
					Route::get('/', 'TeamResourceController@currentResources')->name('resources');
					Route::get('/add', 'TeamResourceController@availableResources')->name('new-resource');
				});
			    
			});

			Route::get('/home', 'HomeController@index')->name('home');
		});	

		// Stripe Callback
		Route::get('/webhook/internal/stripe/oauth/{code?}', 'Admin\StripeController@index')->name('stripe-connect-callback')->middleware('can:manage stripe account');
	});

	

	Route::middleware('auth')->group(function () {
		Route::namespace('Audience\Shopper')->group(function () {
			Route::prefix('shopping')->group(function () {
				Route::prefix('stripe')->group(function () {
					// Stripe Routes
					// Route::get('/portal', 'StripeController@billingPortal')->name('stripe-portal');
					Route::get('/', 'StripeController@index')->name('stripe-index');
					Route::post('/addresses', 'StripeController@addresses')->name('submit-address');
					Route::get('/checkout', 'StripeController@checkout')->name('stripe-checkout');
					Route::post('/checkout', 'StripeController@processCheckout');
					Route::get('/payment/{receiptId}', 'StripeController@payment')->name('stripe-payment');
					Route::post('/payment/{receiptId}', 'StripeController@processCheckout');
				});
				Route::get('/receipt/{receiptId}', 'ReceiptController@index')->name('shopping-receipt');
			});
		});
	});

	
	
// });

// Redirect to team login
// Route::get('/dashboard', 'Admin\DashboardController@index');

// Route::get('/', function() {
// 	return 'Homepage';
// });

Route::namespace('SuperAdmin')->group(function () {
	// Routes SuperAdmin Can Access
});




/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

    Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
});
