<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['audience.homepage', 'partials.topnav.admin', 'partials.sidenav.admin'], 'App\Http\View\Composers\TeamComposer'
        );

        View::composer(
            ['stripe.checkout'], 'App\Http\View\Composers\AddressComposer'
        );
    }
}
