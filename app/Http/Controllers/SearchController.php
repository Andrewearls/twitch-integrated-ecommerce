<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
        $categoryList = Category::all();
    	$category = Category::where('title', $categoryTitle)->first();
    	$articleList = $category->articles;

        // dd( $articleList);
    	return view('layouts.page.directory', [
    		'articleList' => $articleList,
            'categoryList' => $categoryList,
            'pageHeading' => 'Category:',
            'secondaryHeading' => $category->title,
    	]);
    }
}
