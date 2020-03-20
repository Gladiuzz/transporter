<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class ActiveLinkServiceProvider extends ServiceProvider
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
        $page = '';

        if(Request::segment(1) == '') {
            $page = 'dashboard';
        }

        if(Request::segment(1) == 'pegawai') {
            $page = 'pegawai';
        }

        if(Request::segment(1) == 'jabatan') {
            $page = 'jabatan';
        }

        if(Request::segment(1) == 'pengiriman') {
            $page = 'pengiriman';
        }

        if(Request::segment(1) == 'kas-kecil') {
            $page = 'kas-kecil';
        }

        view()->share('page', $page);
    }
}
