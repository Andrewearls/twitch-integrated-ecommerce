<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Return a list of this users stores.
     *
     * @param Request
     * @return view
     */
    public function index(Request $request)
    {
    	$stores = $request->user()->stores;

    	return view('admin.layouts.pages.store.search')->with(['stores' => $stores]);
    }
}
