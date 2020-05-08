<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function index($articleURL)
    {
    	$article = Article::where('url', $articleURL)->first();
    	$categoryList = Category::all();
    	return view('layouts.page.article', [
    		'article' => $article,
    		'categoryList' => $categoryList,
    	]);
    }
}
