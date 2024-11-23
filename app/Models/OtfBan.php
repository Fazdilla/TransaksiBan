<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtfBan extends Model
{
    use HasFactory;
    protected $fillable = [
        'cabang_id',
        'ban_id',
        'kendaraan_id',
        'tanggal_otf',
        'posisi_ban',
        'nama_status_ban',
        'km_tempuh_otf',
        'ketebalan',
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
        $this->status_ban = 'otf';  // status untuk OTF Ban
        $this->save();
    }
}
