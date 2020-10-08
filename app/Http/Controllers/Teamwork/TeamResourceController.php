<?php

namespace App\Http\Controllers\Teamwork;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamResourceController extends Controller
{
    /**
     * Display list of resources used by the current team.
     *
     * @param Request
     * @return view
     */
    public function currentResources(Request $request)
    {
    	return view('admin.layouts.pages.resources.list');
    }

    /**
     * Add a new resource to the users current team.
     *
     * @param Request
     * @return view
     */
    public function availableResources(Request $request)
    {
    	return view('admin.layouts.pages.resources.list');
    }
}
