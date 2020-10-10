<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Models\User;
use App\Category;
use App\Twitch;

class ArticleDirectoryController extends Controller
{
    public function index()
    {
    	$articleList = Article::all();
    	$categoryList = Category::all();
        $twitch = Twitch::where('id', 1)->first();
    	
    	return view('layouts.page.directory', [
    		'articleList' => $articleList, 
    		'categoryList' => $categoryList,
            'pageHeading' => 'All Ariticles:',
            'secondaryHeading' => 'For Your Enjoyment',
            'twitch' => $twitch,
    	]);
    }
}
