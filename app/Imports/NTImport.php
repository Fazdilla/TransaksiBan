<?php
namespace App\Imports;

use App\Models\NT;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;

class NTImport implements ToModel, WithStartRow, WithChunkReading
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
        return 3; // Mulai dari baris ke-2 untuk menghindari header
    }

    /**
     * Mengubah baris Excel menjadi model
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new NT([
            'tanggal_masuk_kiriman' => \Carbon\Carbon::parse($row[0]), // Misalnya kolom pertama untuk tanggal
            'bulan' => $row[1],
            'no_surat_jalan' => $row[2],
            'from' => $row[3],
            'nomor_seri_diterima' => $row[4],
            'nomor_seri_surat_jalan' => $row[5],
            'ukuran' => $row[6],
            'merk' => $row[7],
            'type' => $row[8],
            'status' => $row[9],
            'treaddepth' => $row[10],
            'lokasi' => $row[11],
            'area' => $row[12],
            'mutasi_ban' => $row[13],
            // 'status_ban_lepas' => $row[17],
            // 'keterangan' => $row[19], 
            
        ]);
    }
}
