<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
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
     * Create a new store.
     *
     * @param Request
     * @return redirect resources
     */
    public function create(Request $request)
    {
        $store = $request->user()->currentTeam->store()->create();

        return redirect()->route('resources');
    }

    /**
     * Return the edit Store view.
     *
     * @return view
     */
    public function edit($store = null)
    {
        $team = Team::find(env('APP_TEAM'));
        // dd(empty($team->store));
        if (empty($team->store)) {
            return redirect()->route('store-new');
        }

    	// $store = Store::first($store);
        return view('admin.layouts.pages.store.edit')->with(['store' => $team->store]);
    }

    /**
     * Update a store.
     *
     * @param Request
     * @return redirect
     */
    public function update(Request $request)
    {
        $store = Store::find(env('APP_STORE'));

        $store->save();

        return redirect()->route('dashboard');
    }
}
