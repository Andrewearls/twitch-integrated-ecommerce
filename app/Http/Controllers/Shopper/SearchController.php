<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;

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

    public function author($authorURL)
    {
        $author = User::where('url', $authorURL)->first();
        $articleList = $author->articles;
        $categoryList = Category::all();

        return view('layouts.page.directory', [
            'articleList' => $articleList,
            'categoryList' => $categoryList,
            'pageHeading' => 'Author',
            'secondaryHeading' => $author->name,
        ]);
    }
}
