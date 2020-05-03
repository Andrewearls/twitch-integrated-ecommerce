<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
    	$validatedData = $request->validate([
    		'message' => 'required|unique:Categories,title',
    	]);

    	Categories::create([
    		'title' => $request['message'],
    	]);

    	return "success";
    }
}
