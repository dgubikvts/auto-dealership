<?php

namespace App\Services\EnumHelper;

use Illuminate\Support\Str;

class EnumHelper
{
    public static function getCaseByValue(string $class, ?string $value)
    {
        $case = $class::tryFrom($value)?->name;
        if(!$case) return null;
        return constant("$class::$case");
    }

    public static function valueExists(string $name, mixed $value)
    {
        $name = ucfirst(Str::camel($name));
        $class = "App\\Enum\\{$name}Enum";
        if(!class_exists($class)) return null;
        return $class::tryFrom($value);
    }
}
