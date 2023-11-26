<?php

namespace App\Models;

use App\Enum\FuelEnum;
use App\Enum\VehicleTypeEnum;
use App\Enum\WheelsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => VehicleTypeEnum::class,
        'wheels' => WheelsEnum::class,
        'fuel' => FuelEnum::class,
    ];

    protected $fillable = [
        'brand',
        'vehicle_type',
        'wheels',
        'transmission',
        'fuel',
        'model',
        'year',
        'mileage',
        'price'
    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function getPriceAttribute(): float|int
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAttribute($value): void
    {
        $this->attributes['price'] = $value * 100;
    }
}
