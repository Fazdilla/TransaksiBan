<?php

namespace App\Imports;

use App\Models\DataLepas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;

class DataLepasImport implements ToModel, WithStartRow, WithChunkReading
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
        return new DataLepas([
            'nama_cabang' => $row[0],
            'no_seri_ban' => $row[1],
            // 'serinopol' => $row[2],
            'serinopol' => $row[1] . $row[4],
            'merek' => $row[3],
            'nopol' => $row[4],
            'kapasitas' => $row[5],
            // 'tanggal_pelepasan' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row[6]),
            // 'tanggal_pelepasan' => \Carbon\Carbon::createFromFormat('m/d/Y g:i:s A', $row[6])->format('Y-m-d H:i:s'),
            'tanggal_pelepasan' => \Carbon\Carbon::parse(strtotime($row[6]))->format('Y-m-d H:i:s'),
            'posisi_ban' => $row[7],
            'status_ban_lepas' => $row[8],
            'status_sebelum_lepas' => $row[9],
            'tindakan_akhir' => $row[10],
            'vulkanisir_ke' => $row[11],
            'ketebalan_sebelum_lepas' => $row[12],
            'tgl_ketebalan_sebelum_lepas' => \Carbon\Carbon::parse($row[13]),
            'ketebalan_lepas' => $row[14],
            'alasan_lepas' => $row[15],
            'supplier_ban' => $row[16],
            'km_akhir' => $row[17],
            'km_pasang' => $row[18],
            'km_tempuh' => $row[19],
            'ketebalan_pasang' => $row[20],
            'tanggal_pasang_ban' => \Carbon\Carbon::parse($row[21]),
            'ukuran_ban' => $row[22],
            'konsumsi_ketebalan' => $row[23],
            'waktu_pakai_ban' => $row[24],
            'umur_ban' => $row[25],
            'jenis_telapak' => $row[26],      
        ]);
    }
}


