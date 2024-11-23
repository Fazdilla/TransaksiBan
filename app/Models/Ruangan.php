<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function alatmedis(): BelongsToMany
    // {
    //     return $this->belongsToMany(AlatMedis::class, 'ruang_id');
    // }

    public function alatmedis()
    {
        return $this->hasMany(AlatMedis::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
