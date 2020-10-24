<?php

namespace App\Http\Controllers\Audience;

use App\Http\Controllers\Controller as OriginalController;
use Illuminate\Http\Request;

class Controller extends OriginalController
{
    /**
     * Return team homepage.
     *
     * @param Request
     * @return view
     */
    public function index(Request $request, $teamSlug)
    {
    	// return $teamSlug;
        return view('audience.homepage');
    }
}
