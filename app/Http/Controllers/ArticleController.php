<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Categories;

class ArticleController extends Controller
{
    public function index($articleURL)
    {
    	$article = Articles::where('url', $articleURL)->first();
    	$categoryList = Categories::all();
    	return view('layouts.page.article', [
    		'article' => $article,
    		'categoryList' => $categoryList,
    	]);
    }
}
