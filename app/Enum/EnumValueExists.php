<?php

namespace App\Enum;

use Illuminate\Support\Str;

class EnumValueExists
{
    public static function for(string $name, mixed $value)
    {
        $name = ucfirst(Str::camel($name));
        $class = __NAMESPACE__ . "\\{$name}Enum";
        if(!class_exists($class)) return null;
        return $class::tryFrom($value);
    }
}
