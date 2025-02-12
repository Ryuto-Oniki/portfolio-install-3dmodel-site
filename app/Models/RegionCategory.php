<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCategory extends Model
{
    use HasFactory;

    public function areadetails()
    {
        return $this->belongsToMany(AreaDetail::class);
    }
}
