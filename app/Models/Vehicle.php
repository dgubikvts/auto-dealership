<?php

namespace App\Models;

use App\Enum\FuelEnum;
use App\Enum\TransmissionEnum;
use App\Enum\VehicleTypeEnum;
use App\Enum\WheelsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $casts = [
        'vehicle_type' => VehicleTypeEnum::class,
        'wheels' => WheelsEnum::class,
        'fuel' => FuelEnum::class,
        'transmission' => TransmissionEnum::class,
    ];

    protected $fillable = [
        'brand_id',
        'vehicle_type',
        'wheels',
        'transmission',
        'fuel',
        'model',
        'year',
        'mileage',
        'price'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
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
