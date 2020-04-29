<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleDirectoryController extends Controller
{
    public function index()
    {
    	return view('layouts.page.directory');
    }
}
