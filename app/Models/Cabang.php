<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_cabang',
        'lokasi',
        'area',
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
