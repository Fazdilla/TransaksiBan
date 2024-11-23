<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nopol',
        'kapasitas',
        'kategori_kend',
    ];

    public function pemakaianBan()
    {
        return $this->hasMany(PemakaianBan::class);
    }

    public function otfBan()
    {
        return $this->hasMany(OtfBan::class);
    }
}
