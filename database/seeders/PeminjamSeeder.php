<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nim'=>2141720015,
                'nama_peminjam'=>'Syahla Syafiqah',
                'jenis_kelamin'=>'Perempuan',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'081232125674',
            ],
            [
                'nim'=>2141720229,
                'nama_peminjam'=>'Faiz Atha',
                'jenis_kelamin'=>'Laki Laki',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'085821675432',
            ],
            [
                'nim'=>2141720197,
                'nama_peminjam'=>'Farhan Riza',
                'jenis_kelamin'=>'Laki Laki',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'089765342134',
            ],
            [
                'nim'=>2141720076,
                'nama_peminjam'=>'Dzaka Murran',
                'jenis_kelamin'=>'Laki Laki',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'081265328877',
            ],
            [
                'nim'=>2141720016,
                'nama_peminjam'=>'Zahra Annisa',
                'jenis_kelamin'=>'Perempuan',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'085876321122',
            ],
            [
                'nim'=>2141720250,
                'nama_peminjam'=>'RR Denti',
                'jenis_kelamin'=>'Perempuan',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'089865432345',
            ],
            [
                'nim'=>2141720047,
                'nama_peminjam'=>'Yasmine Navisha',
                'jenis_kelamin'=>'Perempuan',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'081346879988',
            ],
            [
                'nim'=>2141720241,
                'nama_peminjam'=>'Yuliyana Rahmawati',
                'jenis_kelamin'=>'Perempuan',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'08756459900',
            ],
            [
                'nim'=>2141720073,
                'nama_peminjam'=>'Abdullah Azzam',
                'jenis_kelamin'=>'Laki Laki',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'087865908076',
            ],
            [
                'nim'=>2141720077,
                'nama_peminjam'=>'Bima Tristam',
                'jenis_kelamin'=>'Laki Laki',
                'prodi'=>'Teknik Informatika',
                'kelas'=>'TI-2F',
                'no_handphone'=>'081278965432',
            ],
        ];
        DB::table('peminjam')->insert($data);
    }
}
