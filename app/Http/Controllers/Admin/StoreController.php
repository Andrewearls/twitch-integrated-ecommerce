<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display new store view.
     *
     * @return redirect
     */
    public function index()
    {
        $store = new Store;
        return view('admin.layouts.pages.store.edit')->with(['store' => $store]);
    }
    /**
     * Return the edit Store view.
     *
     * @return view
     */
    public function edit($store = null)
    {
        if (empty($store)) {
            return redirect()->route('store-new');
        }

    	$store = Store::first($store);
        return view('admin.layouts.pages.store.edit')->with(['store' => $store]);
    }

    /**
     * Update a store.
     *
     * @param Request
     * @param store id
     * @return redirect
     */
    public function update(Request $request, $id = null)
    {
        $store = new Store;

        if (!empty($id)) {
            $store = Store::find($id);
        }

        $store->name = $request->name;
        $store->slug = $request->slug;

        $request->user()->stores()->save($store);

        return redirect()->route('dashboard');
    }
}
