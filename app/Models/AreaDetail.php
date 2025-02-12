<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDetail extends Model
{
    use HasFactory;

    public function objectmodels()
    {
        return $this->belongsToMany(ObjectModel::class);
    }

    public function regioncategories()
    {
        return $this->belongsToMany(RegionCategory::class);
    }

    public function terraincategories()
    {
        return $this->belongsToMany(TerrainCategory::class);
    }

}
