<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianBan extends Model
{
    use HasFactory;
    protected $fillable = [
        'cabang_id',
        'ban_id',
        'kendaraan_id',
        'tanggal_pemakaian',
        'posisi_ban',
        'no_wo',
        'nama_status_ban',
        'km_awal',
        'km_tempuh',
        'ketebalan',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function ban()
    {
        return $this->belongsTo(Ban::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
    public function lepasBan()
    {
        return $this->hasOne(LepasBan::class, 'serinopol', 'serinopol')
            ->whereColumn('nopol', 'pemakaian.nopol');
    }
}
