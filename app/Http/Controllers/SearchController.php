<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class SearchController extends Controller
{
    public function index($keywords)
    {
    	//validate
    	//sanitize
    	//query database
    	//return results
    	return $keywords;
    }

    public function category($categoryTitle)
    {
    	$category = Categories::where('title', $categoryTitle)->first();
    	$articleList = $category->articles();

    	return view('layouts.page.directory', [
    		'articleList' => $articleList,
    	]);
    }
}
