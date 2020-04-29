<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class ArticleDirectoryController extends Controller
{
    public function index()
    {
    	$articleList = Articles::all();
    	return view('layouts.page.directory', ['articleList' => $articleList]);
    }
}
