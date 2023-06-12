<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
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
                'id_jenis'=>01,
                'jenis_alat'=>'Peralatan Makan',
                'dekskripsi_jenis'=>'Peralatan yang digunakan untuk makan',
            ],
            [
                'id_jenis'=>02,
                'jenis_alat'=>'Peralatan Tidur',
                'dekskripsi_jenis'=>'Peralatan yang digunakan untuk tidur',
            ],
            [
                'id_jenis'=>03,
                'jenis_alat'=>'Kebutuhan Lain',
                'dekskripsi_jenis'=>'Peralatan yang digunakan untuk hal lain',
            ],
            [
                'id_jenis'=>04,
                'jenis_alat'=>'Peralatan Kebersihan',
                'dekskripsi_jenis'=>'Peralatan yang digunakan untuk bebersih',
            ],
            [
                'id_jenis'=>05,
                'jenis_alat'=>'Peralatan Keselamatan',
                'dekskripsi_jenis'=>'Peralatan yang digunakan untuk keselamatan',
            ],
        ];
        DB::table('jenis')->insert($data);
    }
}
