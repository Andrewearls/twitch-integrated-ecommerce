<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Articles;
use App\Categories;

class NewArticleController extends Controller
{
    public function index()
    {
        $categoryList = Categories::all();
    	return view('layouts.page.newArticle', [
            'categoryList' => $categoryList,
        ]);
    }

    public function post(Request $request)
    {
    	$user = Auth::user();

    	$validatedData = $request->validate([
    		'article-title' => 'required',
    		'article-preview-image' => 'required|image',
    		'article-content' => 'required'
    	]);

    	// $article = new Articles;
    	Articles::create([
    		'title' => $request['article-title'],
    		'content' => $request['article-content'],
    		'picture' => $request['article-preview-image'],
    		'user_id' => Auth::id(),
    	]);

    	// $article->save();

    	return redirect()->route('article');
    }
}
