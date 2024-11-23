<?php

namespace App\Imports;

use App\Models\Pemakaian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;

class PemakaianImport implements ToModel, WithStartRow, WithChunkReading
{
    use Importable;

    /**
     * Fungsi untuk mendefinisikan ukuran chunk
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000; // Jumlah data per chunk
    }

    /**
     * Mengatur mulai dari baris data (misalnya jika ada header di baris pertama)
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Mulai dari baris ke-2 untuk menghindari header
    }

    /**
     * Mengubah baris Excel menjadi model
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pemakaian([
            'nama_cabang' => $row[0],           
            'no_seri_ban' => $row[1],           
            'merek_ban' => $row[2],             
            'nopol' => $row[3],                
            'kapasitas' => $row[4],             
            // 'tanggal_pemakaian' => \Carbon\Carbon::parse($row[5]), 
            // 'tanggal_pemakaian' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row[5]),
            // 'tanggal_pemakaian' => \Carbon\Carbon::createFromFormat('m/d/Y h:i:s A', str_replace(' ', '', $row[5]))->format('Y-m-d H:i:s'),
            // 'tanggal_pemakaian' => \Carbon\Carbon::createFromFormat('m/d/Y g:i:s A', $row[5])->format('Y-m-d H:i:s'),
            'tanggal_pemakaian' => \Carbon\Carbon::parse(strtotime($row[5]))->format('Y-m-d H:i:s'),
            'posisi_ban' => $row[6],            
            'no_wo' => $row[7],                
            'nama_status_ban' => $row[8],       
            'ukuran' => $row[9],               
            'km_awal' => $row[10],              
            'km_tempuh' => $row[11],            
            'ketebalan' => $row[12],          
        ]);
    }
}
