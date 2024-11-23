<?php

namespace App\Imports;

use App\Models\DataOTF;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;

class DataOTFImport implements ToModel, WithStartRow, WithChunkReading
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
        return new DataOTF([
            'cabang' => $row[0],
            'kategori_nopol' => $row[1],
            'kapasitas' => $row[2],
            'posisi' => $row[3],
            'indikasi' => $row[4],
            'no_seri' => $row[5],
            // 'serinopol' => $row[6],
            'serinopol' => $row[5] . $row[8],
            'jenis_aus' => $row[7],
            'nopol' => $row[8],
            'status' => $row[9],
            'vulkanisir_ke' => $row[10],
            'ketebalan_awal' => $row[11],
            'ketebalan' => $row[12],
            'tgl_ketebalan' => \Carbon\Carbon::parse($row[13]),
            'ukuran' => $row[14],
            'merek' => $row[15],
            'km_akhir' => $row[16],
            'km_pasang' => $row[17],
            'tgl_pasang' => \Carbon\Carbon::parse($row[18]),
            'km_tempuh' => $row[19],
            'umur_ban' => $row[20],
            'tgl_masuk_gudang' => \Carbon\Carbon::parse($row[21]),
            'no_spj' => $row[22],
            'asal_pabrikasi' => $row[23],
            'checker_wo' => $row[24],
            'jenis_telapak' => $row[25],       
        ]);
    }
}
