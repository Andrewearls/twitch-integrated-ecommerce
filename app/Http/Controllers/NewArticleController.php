<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewArticleController extends Controller
{
    public function index()
    {
    	return view('layouts.page.newArticle');
    }

    public function post(Request $request)
    {
    	$validatedData = $request->validate([
    		'article-title' => 'required',
    		'article-preview-image' => 'required|image',
    		'article-content' => 'required'
    	]);
    	
    	return $request;
    }
}
