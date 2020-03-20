<?php

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::insert([
            [
                'nip' => 'P000001',
                'nama' => 'Dede Rusliandi',
                'tanggal_lahir' => '1998-07-29',
                'jenis_kelamin' => 0,
                'nomor_telepon' => '081223230946',
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 1,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000002',
                'nama' => 'Della Fadila Rahmawati',
                'tanggal_lahir' => '1997-01-09',
                'nomor_telepon' => '081223230946',
                'jenis_kelamin' => 1,
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 2,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000003',
                'nama' => 'Siti Habibah',
                'tanggal_lahir' => '1991-08-29',
                'nomor_telepon' => '081223230946',
                'jenis_kelamin' => 1,
                'status_perkawinan' => 1,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 3,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000004',
                'nama' => 'Jajang Jumyadi',
                'tanggal_lahir' => '1993-02-20',
                'nomor_telepon' => '081223230946',
                'jenis_kelamin' => 0,
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 4,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000005',
                'nama' => 'Rifki Adha Darmawan',
                'tanggal_lahir' => '1991-07-29',
                'nomor_telepon' => '081223230946',
                'jenis_kelamin' => 0,
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 5,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000006',
                'nama' => 'Tasya Pratika Widjaya',
                'tanggal_lahir' => '1989-3-29',
                'nomor_telepon' => '081223230946',
                'jenis_kelamin' => 0,
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 6,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000007',
                'nama' => 'Erick Argenta',
                'tanggal_lahir' => '1998-10-29',
                'jenis_kelamin' => 0,
                'nomor_telepon' => '081223230946',
                'status_perkawinan' => 1,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 7,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000008',
                'nama' => 'Hadi Himawan',
                'tanggal_lahir' => '1998-11-11',
                'jenis_kelamin' => 0,
                'nomor_telepon' => '081223230946',
                'status_perkawinan' => 0,
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 8,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000009',
                'nama' => 'Aisyah Fitriyani',
                'tanggal_lahir' => '1998-07-10',
                'jenis_kelamin' => 1,
                'status_perkawinan' => 0,
                'nomor_telepon' => '081223230946',
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 9,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
            [
                'nip' => 'P000010',
                'nama' => 'Elsa Nur Oktaviar',
                'tanggal_lahir' => '1998-12-11',
                'jenis_kelamin' => 1,
                'status_perkawinan' => 0,
                'nomor_telepon' => '081223230946',
                'provinsi_id' => 9,
                'kota_id' => 22,
                'jabatan_id' => 10,
                'alamat' => 'Jl bandung kecamatan aceh barat',
            ],
        ]);
    }
}
