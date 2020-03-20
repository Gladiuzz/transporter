<?php

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::insert([
            [
                'nama' =>  'Direktur Utama',
                'gaji_pokok' => 15000000
            ],
            [
                'nama' => 'Direktur Personalia',
                'gaji_pokok' => 8500000
            ],
            [
                'nama' => 'Direktur Keuangan',
                'gaji_pokok' => 9000000
            ],
            [
                'nama' => 'Manager',
                'gaji_pokok' => 11000000
            ],
            [
                'nama' => 'Manager Personalia',
                'gaji_pokok' => 7500000
            ],
            [
                'nama' => 'Manager Pemasaran',
                'gaji_pokok' => 6700000
            ],
            [
                'nama' => 'Admin Gudang',
                'gaji_pokok' => 5600000
            ],
            [
                'nama' => 'Programmer',
                'gaji_pokok' => 8900000
            ],
            [
                'nama' => 'Designer',
                'gaji_pokok' => 12000000
            ],
            [
                'nama' => 'Ajudan',
                'gaji_pokok' => 3200000
            ],   
        ]);
    }
}
