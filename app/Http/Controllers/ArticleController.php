<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Articles;

class ArticleController extends Controller
{
    public function index($articleId)
    {
    	$article = Articles::find($articleId);
    	return view('layouts.page.article', [
    		'article' => $article
    	]);
    }
}
