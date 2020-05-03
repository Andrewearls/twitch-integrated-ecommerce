<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\User;
use App\Categories;

class ArticleDirectoryController extends Controller
{
    public function index()
    {
    	$articleList = Articles::all();
    	$categoryList = Categories::all();
    	
    	return view('layouts.page.directory', [
    		'articleList' => $articleList, 
    		'categoryList' => $categoryList,
    	]);
    }
}
