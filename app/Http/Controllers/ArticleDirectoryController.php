<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Category;

class ArticleDirectoryController extends Controller
{
    public function index()
    {
    	$articleList = Article::all();
    	$categoryList = Category::all();
    	
    	return view('layouts.page.directory', [
    		'articleList' => $articleList, 
    		'categoryList' => $categoryList,
            'pageHeading' => 'All Ariticles:',
            'secondaryHeading' => 'For Your Enjoyment',
    	]);
    }
}
