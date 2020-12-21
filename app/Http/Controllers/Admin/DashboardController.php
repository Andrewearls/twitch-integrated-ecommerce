<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd(Auth()->user()->hasPermissionTo('edit resources'));
    	return view('layouts.page.dashboard');
    }

    public function userArticles()
    {
    	$user = Auth::user();
    	$articleList = $user->articles;
    	// dd($articleList);
    	return view('partials.cards.admin.lists.articles', [
    		'articleList' => $articleList,
    	]);
    }
}
