<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

class NewArticleController extends Controller
{

    public function index()
    {
        $categoryList = Category::all();
    	return view('layouts.page.newArticle', [
            'categoryList' => $categoryList,
        ]);
    }

    public function create(Request $request)
    {
    	$user = Auth::user();

    	$validatedData = $request->validate([
    		'article-title' => 'required',
    		'article-preview-image' => 'required|image',
    		'article-content' => 'required',
            'article-categories.*' => 'required',
    	]);

    	// $article = new Articles;
    	$article = Article::create([
    		'title' => $request['article-title'],
    		'content' => $request['article-content'],
    		'picture' => $request['article-preview-image'],
    		'user_id' => Auth::id(),
            'url' => str_replace(' ', '-', $request['article-title']),
    	]);

        // return $request;

        foreach ($request['article-categories'] as $categoryTitle) {
            $category = Category::where('title', $categoryTitle)->first();
            $category->articles()->attach($article->id);
        };

    	return redirect()->route('article', [
            'url' => $article->url,
        ]);
    }
}
