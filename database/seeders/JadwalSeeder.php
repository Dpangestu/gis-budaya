<?php

namespace Database\Seeders;

use App\Models\JadwalModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'nama_acara'    => 'MILAD SANGGAR INTAN DEWI',
                'deskripsi'     => 'Acara ini memperingati milad sanggar',
                'id_seni'       => '1',
                'id_budaya'     => '1',
                'mulai_acara'   => NOW(),
                'akhir_acara'   => NOW(),
                'warna_acara'   => '#00a65a',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_acara'    => 'Ngunjung Buyut',
                'deskripsi'     => 'Acara ini memperingati .....',
                'id_seni'       => '1',
                'id_budaya'     => '1',
                'mulai_acara'   => NOW(),
                'akhir_acara'   => NOW(),
                'warna_acara'   => '#00a65a',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_acara'    => 'Pentas Lawas',
                'deskripsi'     => 'Acara ini dilaksanakan untuk menguji mental murid sanggar',
                'id_seni'       => '2',
                'id_budaya'     => '1',
                'mulai_acara'   => NOW(),
                'akhir_acara'   => NOW(),
                'warna_acara'   => '#00a65a',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_acara'    => 'CONTOH AJA LAH',
                'deskripsi'     => 'Acara ini memperingati ',
                'id_seni'       => '3',
                'id_budaya'     => '1',
                'mulai_acara'   => NOW(),
                'akhir_acara'   => NOW(),
                'warna_acara'   => '#00a65a',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_acara'    => 'CONTOH AJA LAH 2',
                'deskripsi'     => 'Acara ini memperingati ....',
                'id_seni'       => '4',
                'id_budaya'     => '1',
                'mulai_acara'   => NOW(),
                'akhir_acara'   => NOW(),
                'warna_acara'   => '#00a65a',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
        ];

        foreach ($events as $jadwal) {
            JadwalModel::create($jadwal);
        }
    }
}