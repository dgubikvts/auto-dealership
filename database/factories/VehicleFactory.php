<?php

namespace Database\Factories;

use App\Enum\FuelEnum;
use App\Enum\TransmissionEnum;
use App\Enum\VehicleTypeEnum;
use App\Enum\WheelsEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vehicle_type' => fake()->randomElement(VehicleTypeEnum::cases()),
            'wheels' => fake()->randomElement(WheelsEnum::cases()),
            'transmission' => fake()->randomElement(TransmissionEnum::cases()),
            'fuel' => fake()->randomElement(FuelEnum::cases()),
            'model' => fake()->name(),
            'year' => fake()->year(),
            'mileage' => fake()->numberBetween(0, 150000),
            'price' => fake()->numberBetween(2000, 400000),
        ];
    }
}
