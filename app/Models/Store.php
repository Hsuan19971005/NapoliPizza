<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model {
    protected $fillable = ['name', 'district', 'address', 'opening_hours'];
    use HasFactory;
}
