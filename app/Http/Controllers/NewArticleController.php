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
    	return $request;
    }
}
