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

    	//this the sanitation should take place 
    	//before the validation
    	//both the validation and sanitation
    	//should be in a formrequest
    	Categories::create([
    		'title' => json_decode($request['message'])	,
    	]);

    	return "success";
    }
}
