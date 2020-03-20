<?php

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kota;

class WilayahTableSeeder extends Seeder
{

    /**
     * The filesystem storage.
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $storage;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->storage = Storage::disk('local');

        $this->storeProvince();

        $this->storeCities();
    }

    public function storeProvince($file = 'states/provinsi.json')
    {
        $provinsi = [];
        if($this->storage->exists($file)) {
            $provinsi = json_decode($this->storage->get($file), true);
        }

        if($provinsi) {
            Provinsi::insert($provinsi);
        }
    }

    public function storeCities($file = 'states/kota.json')
    {
        $kota = [];
        if($this->storage->exists($file)) {
            $kota = json_decode($this->storage->get($file), true);
        }

        if($kota) {
            Kota::insert($kota);
        }
    }
}
