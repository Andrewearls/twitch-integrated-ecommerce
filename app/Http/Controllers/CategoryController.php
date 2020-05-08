<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
    	$validatedData = $request->validate([
    		'message' => 'required|unique:Categories,title',
    	]);

    	//this the sanitation should take place 
    	//before the validation
    	//both the validation and sanitation
    	//should be in a formrequest
    	$category = Category::create([
    		'title' => json_decode($request['message'])	,
    	]);

    	return view('partials.buttons.category', [
            'category' => $category,
        ]);
    }
}
