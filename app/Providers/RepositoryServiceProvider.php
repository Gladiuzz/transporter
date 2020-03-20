<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{JabatanContract, PegawaiContract, KotaContract, ProvinsiContract, PengirimanContract, KasKecilContract, UserContract};
use App\Repositories\{JabatanRepository, PegawaiRepository, KotaRepository, ProvinsiRepository, PengirimanRepository, KasKecilRepository, UserRepository};

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            JabatanContract::class,
            JabatanRepository::class
        );

        $this->app->bind(
            PegawaiContract::class,
            PegawaiRepository::class
        );

        $this->app->bind(
            KotaContract::class,
            KotaRepository::class
        );

        $this->app->bind(
           ProvinsiContract::class,
           ProvinsiRepository::class
        );

        $this->app->bind(
            PengirimanContract::class,
            PengirimanRepository::class
        );

        $this->app->bind(
            KasKecilContract::class,
            KasKecilRepository::class
        );

        $this->app->bind(
            UserContract::class,
            UserRepository::class
        );
    }
}
