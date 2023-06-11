<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeniModel;

class SeniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senis = [[
                'nama_seni' => 'Sanggar Seni A',
                'deskripsi' => 'Sanggar ',
                'pengelola' => 'Prabowo',
                'kategori'  => 'Seni Tari',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_seni' => 'Sanggar Seni B',
                'deskripsi' => 'Sanggar ',
                'pengelola' => 'Mafud',
                'kategori'  => 'Seni Tari',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_seni' => 'Sanggar Seni C',
                'deskripsi' => 'Sanggar ',
                'pengelola' => 'Ganjar',
                'kategori'  => 'Seni Tari',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_seni' => 'Sanggar Seni D',
                'deskripsi' => 'Sanggar ',
                'pengelola' => 'Ridwan Kamil',
                'kategori'  => 'Seni Tari',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_seni' => 'Sanggar Seni E',
                'deskripsi' => 'Sanggar ',
                'pengelola' => 'Mega Chaaaannn',
                'kategori'  => 'Seni Tari',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
        ];

        foreach ($senis as $seni) {
            SeniModel::create($seni);
        }
    }
}