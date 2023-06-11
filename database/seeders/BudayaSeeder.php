<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BudayaModel;

class BudayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $budayas = [[
                'nama_budaya' => 'Sunan Gunung jati',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab, inventore quos nihil dolore repudiandae a expedita modi aut explicabo assumenda dolor eius deserunt autem eos cupiditate amet non? Maxime!',
                'pengelola' => 'Prabowo',
                'kategori'  => 'Wisata Religi',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_budaya' => 'Mbah Kuwu Sangkan',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab, inventore quos nihil dolore repudiandae a expedita modi aut explicabo assumenda dolor eius deserunt autem eos cupiditate amet non? Maxime!',
                'pengelola' => 'Mafud',
                'kategori'  => 'Wisata Religi',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_budaya' => 'Situs Purbakala',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab, inventore quos nihil dolore repudiandae a expedita modi aut explicabo assumenda dolor eius deserunt autem eos cupiditate amet non? Maxime!',
                'pengelola' => 'Ganjar',
                'kategori'  => 'Wisata Religi',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_budaya' => 'Lawang Sewu',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab, inventore quos nihil dolore repudiandae a expedita modi aut explicabo assumenda dolor eius deserunt autem eos cupiditate amet non? Maxime!',
                'pengelola' => 'Ridwan Kamil',
                'kategori'  => 'Wisata Religi',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
            [
                'nama_budaya' => 'Kelenteng Jamblang',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ab, inventore quos nihil dolore repudiandae a expedita modi aut explicabo assumenda dolor eius deserunt autem eos cupiditate amet non? Maxime!',
                'pengelola' => 'Mega Chaaaannn',
                'kategori'  => 'Wisata Religi',
                'htm'       => '0',
                'latitude'  => '-6.72605984726',
                'longitude' => '108.570985965',
            ],
        ];

        foreach ($budayas as $budaya) {
            BudayaModel::create($budaya);
        }
    }
}