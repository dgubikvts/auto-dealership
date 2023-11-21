<?php

namespace App\Enum;

enum VehicleTypeEnum: string
{
    case PICKUP = 'Pickup';
    case SUV = 'SUV';
    case HATCHBACK = 'Hatchback';
    case SEDAN = 'Sedan';
    case CABRIOLET = 'Cabriolet';
    case VAN = 'Van';
    case MINIVAN = 'Minivan';
}
