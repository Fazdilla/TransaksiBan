<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public function run()
    {
        $kendaraans = [
            [
                'nopol' => 'B 1234 ABC',
                'kapasitas' => '2000',
                'kategori_kend' => 'Truck',
            ],
            [
                'nopol' => 'B 5678 DEF',
                'kapasitas' => '1500',
                'kategori_kend' => 'Pick Up',
            ],
            [
                'nopol' => 'B 9012 GHI',
                'kapasitas' => '3000',
                'kategori_kend' => 'Truck',
            ],
            [
                'nopol' => 'B 3456 JKL',
                'kapasitas' => '1000',
                'kategori_kend' => 'Pick Up',
            ],
            [
                'nopol' => 'B 7890 MNO',
                'kapasitas' => '2500',
                'kategori_kend' => 'Truck',
            ],
        ];

        foreach ($kendaraans as $kendaraan) {
            Kendaraan::create($kendaraan);
        }
    }
}
