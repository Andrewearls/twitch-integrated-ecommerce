<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    /**
     * Return the edit Store view.
     *
     * @return view
     */
    public function edit($store = null)
    {
    	$store = Store::firstOrNew($store);
    	return $store;
    }
}
