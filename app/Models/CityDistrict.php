<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityDistrict extends Model {
    use HasFactory;
    protected $fillable = ['city_name', 'district_names'];
    protected $casts    = ['district_names' => 'array'];
}
