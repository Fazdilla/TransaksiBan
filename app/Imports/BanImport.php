<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BanImport implements WithMultipleSheets
{
    /** 
     * Fungsi untuk mendefinisikan sheet yang akan diproses
     *
     * @return array
     */
    public function sheets(): array
    {
        return [
            0 => new NTImport(),        // Sheet 1 untuk NT
            2 => new PemakaianImport(), // Sheet 3 untuk Pemakaian
            3 => new DataOTFImport(), // Sheet 4 untuk Data OTF
            4 => new DataLepasImport(), // Sheet 5 untuk Data Lepas
        ];
    }
}

