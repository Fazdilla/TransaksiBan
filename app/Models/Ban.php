<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_seri',
        'merek',
        'ukuran',
        'type',
        'status_awal',
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
