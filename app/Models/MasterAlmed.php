<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAlmed extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function alatmedis()
    {
        return $this->hasMany(AlatMedis::class);
    }
}
