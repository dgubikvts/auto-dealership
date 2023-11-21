<?php

namespace App\Rules;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BrandExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Brand::find($value)) $fail("Brand with id $value does not exist!");
    }
}
