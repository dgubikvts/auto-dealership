<?php

namespace App\Rules;

use App\Services\EnumHelper\EnumHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnumExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!EnumHelper::valueExists($attribute, $value)) $fail("$attribute with value $value does not exist!");
    }
}
