<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitch;

class TwitchController extends Controller
{
    public function index()
    {
    	return view('layouts.page.twitch');
    }

    public function update(Request $request)
    {
    	$validatedData = $request->validate([
    		'article-title' => 'required',
            'display' => 'required',
    	]);
    	
    	$twitch = Twitch::updateOrCreate([
    			'id' => 1,
    		], [
	    		'channel' => $validatedData['article-title'],
	    		'display' => $validatedData['display'],
    	]);

    	return $request;
    }
}
