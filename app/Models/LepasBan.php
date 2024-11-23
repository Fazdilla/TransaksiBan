<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LepasBan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_id',
        'ban_id',
        'kendaraan_id',
        'tanggal_pelepasan',
        'posisi_ban',
        'status_ban_lepas',
        'status_sebelum_lepas',
        'tindakan_akhir',
        'vulkanisir_ke',
        'ketebalan_sebelum_lepas',
        'tgl_ketebalan_sebelum_lepas',
        'ketebalan_lepas',
        'alasan_lepas',
        'supplier_ban',
        'km_akhir',
        'km_pasang',
        'km_tempuh',
        'ketebalan_pasang',
        'tanggal_pasang_ban',
        'ukuran_ban',
        'konsumsi_ketebalan',
        'waktu_pakai_ban',
        'umur_ban',
        'jenis_telapak',
    ];

    /**
     * Relasi ke model Cabang
     */
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }

    /**
     * Relasi ke model Ban
     */
    public function ban()
    {
        return $this->belongsTo(Ban::class, 'ban_id');
    }

    /**
     * Relasi ke model Kendaraan
     */
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function updateStatusBan()
    {
        $this->status_ban = 'lepas';  // status untuk Lepas Ban
        $this->save();
    }
}
