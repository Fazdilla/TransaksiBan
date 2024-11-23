<?php

namespace Database\Seeders;

use App\Models\Ban;
use Illuminate\Database\Seeder;

class BanSeeder extends Seeder
{
    public function run()
    {
        $bans = [
            [
                'no_seri' => 'BN001',
                'merek' => 'Bridgestone',
                'ukuran' => '195/65R15',
                'type' => 'Radial',
                'status_awal' => 'Baru',
            ],
            [
                'no_seri' => 'BN002',
                'merek' => 'Michelin',
                'ukuran' => '205/55R16',
                'type' => 'Radial',
                'status_awal' => 'Baru',
            ],
            [
                'no_seri' => 'BN003',
                'merek' => 'Goodyear',
                'ukuran' => '215/45R17',
                'type' => 'Radial',
                'status_awal' => 'Baru',
            ],
            [
                'no_seri' => 'BN004',
                'merek' => 'Continental',
                'ukuran' => '225/40R18',
                'type' => 'Radial',
                'status_awal' => 'Baru',
            ],
            [
                'no_seri' => 'BN005',
                'merek' => 'Dunlop',
                'ukuran' => '235/35R19',
                'type' => 'Radial',
                'status_awal' => 'Baru',
            ],
        ];

        foreach ($bans as $ban) {
            Ban::create($ban);
        }
    }
}
