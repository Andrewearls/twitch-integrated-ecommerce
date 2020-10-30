<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Team;

class CurrentTeamDefaults
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // set the default route subdomain to be the team slug
        URL::defaults(['teamSlug' => request('teamSlug')]);

        // pass the team into the request
        // this should probably be a teamcoordinator
        $request->merge(['team' => Team::find(request('teamSlug'))->first()]);
        // remove the subdomain parameter from the request
        // this prevents the controller from accessing the team slug
        $request->route()->forgetParameter('teamSlug');

        return $next($request);
    }
}
