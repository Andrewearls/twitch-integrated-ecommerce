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

    	$display = 0;

    	if($validatedData['display'] == "on") {
			$display = 1;
		} else {
			$display = 0;
		};
		
    	$twitch = Twitch::updateOrCreate([
    			'id' => 1,
    		], [
	    		'channel' => $validatedData['article-title'],
	    		'display' => $display,	    			
    	]);

    	return redirect()->route('dashboard');
    }
}
