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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/directory', 'ArticleDirectoryController@index')->name('directory');
Route::get('/article/{id}', 'ArticleController@index')->name('article');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/article/new', 'NewArticleController@index')->name('new-article');
Route::post('/dashboard/article/new', 'NewArticleController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
