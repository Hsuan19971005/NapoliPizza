<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model {
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'delivery_time',
        'customer_name',
        'customer_gender',
        'phone',
        'total_price',
        'items',
        'store_id',
    ];
    protected $casts = ['items' => 'array'];

    public function store() {
        return $this->belongsTo(Store::class);
    }

    protected static function boot(): void {
        parent::boot();

        static::creating(function (Order $order) {
            do {
                $datePart             = now()->format('YmdHm');;
                $randomPart           = Str::random(6);
                $order->serial_number = $datePart . $randomPart;
            } while (self::where('serial_number', $order->serial_number)->exists());
        });
    }
}
