<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\Contracts\{JabatanContract, PegawaiContract, KotaContract, ProvinsiContract, PengirimanContract, KasKecilContract, UserContract};
use App\Services\{JabatanService, PegawaiService, KotaService, ProvinsiService, PengirimanService, KasKecilService, UserService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            JabatanContract::class,
            JabatanService::class
        );

        $this->app->bind(
            PegawaiContract::class,
            PegawaiService::class
        );

        $this->app->bind(
            KotaContract::class,
            KotaService::class
        );

        $this->app->bind(
            ProvinsiContract::class,
            ProvinsiService::class
        );

        $this->app->bind(
            PengirimanContract::class,
            PengirimanService::class
        );

        $this->app->bind(
            KasKecilContract::class,
            KasKecilService::class
        );

        $this->app->bind(
            UserContract::class,
            UserService::class
        );
    }
}
