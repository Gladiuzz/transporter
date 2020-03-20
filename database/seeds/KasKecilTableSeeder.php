<?php

use App\Models\KasKecil;
use Illuminate\Database\Seeder;

class KasKecilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KasKecil::insert([
            [
                'keterangan' =>  'Saldo Petty Cash',
                'tanggal' => '2018-08-01',
                'debit' => 5000000,
                'kredit' => 0,
            ],
            [
                'keterangan' => 'Beli Token Listrik',
                'tanggal' => '2018-08-01',
                'debit' => 0,
                'kredit' => 300000,
            ],
            [
                'keterangan' => 'Bayar Uang Sampah',
                'tanggal' => '2018-08-01',
                'debit' => 0,
                'kredit' => 100000,
            ],
            [
                'keterangan' => 'Bayar Uang Keamanan',
                'tanggal' => '2018-08-01',
                'debit' => 0,
                'kredit' => 200000,
            ],
            [
                'keterangan' => 'Bayar Aqua Galon',
                'tanggal' => '2018-08-01',
                'debit' => 0,
                'kredit' => 60000,
            ],
            [
                'keterangan' => 'Beli Kopi dan Kebutuhan Rumah Tangga Kantor',
                'tanggal' => '2018-08-01',
                'debit' => 0,
                'kredit' => 150000,
            ],
        ]);
    }
}
