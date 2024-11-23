<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    public function run()
    {
        $cabangs = [
            [
                'nama_cabang' => 'Cabang Jakarta Pusat',
                'lokasi' => 'Jl. Sudirman No. 123',
                'area' => 'Jakarta Pusat',
            ],
            [
                'nama_cabang' => 'Cabang Jakarta Selatan',
                'lokasi' => 'Jl. Gatot Subroto No. 45',
                'area' => 'Jakarta Selatan',
            ],
            [
                'nama_cabang' => 'Cabang Jakarta Barat',
                'lokasi' => 'Jl. Panjang No. 88',
                'area' => 'Jakarta Barat',
            ],
            [
                'nama_cabang' => 'Cabang Jakarta Timur',
                'lokasi' => 'Jl. Raya Bekasi No. 234',
                'area' => 'Jakarta Timur',
            ],
            [
                'nama_cabang' => 'Cabang Jakarta Utara',
                'lokasi' => 'Jl. Pluit Raya No. 67',
                'area' => 'Jakarta Utara',
            ],
        ];

        foreach ($cabangs as $cabang) {
            Cabang::create($cabang);
        }
    }
}
