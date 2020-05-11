<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitchController extends Controller
{
    public function index()
    {
    	return view('layouts.page.twitch');
    }
}
