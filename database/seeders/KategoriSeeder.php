<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
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
                'id_kategori'=>01,
                'kategori_alat'=>'Caving dan Climbing',
                'foto'=>'aaaa.jpg',
                'dekskripsi_kategori'=>'dua kegiatan yang berhubungan dengan alam bebas dan penggunaan keterampilan fisik dan mental',
            ],
            [
                'id_kategori'=>02,
                'kategori_alat'=>'Pendakian dan Berkemah',
                'foto'=>'bbbbb.jpg',
                'dekskripsi_kategori'=>'dua kegiatan yang terkait erat dengan eksplorasi alam bebas dan menghabiskan waktu di luar ruangan',
            ],
        ];
        DB::table('kategori')->insert($data);
    }
}
