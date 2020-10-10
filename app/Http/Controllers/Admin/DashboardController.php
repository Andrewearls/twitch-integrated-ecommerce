<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    	// return view('layouts.page.dashboard');
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
