<?php

namespace App\Http\Requests;

use App\Rules\BrandExists;
use App\Rules\EnumExists;
use App\Rules\VehicleExists;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'brand_id' => [new BrandExists],
            'vehicle_type' => [new EnumExists],
            'wheels' => [new EnumExists],
            'transmission' => [new EnumExists],
            'fuel' => [new EnumExists],
            'model' => ['min:2', 'max:25'],
            'year' => ['digits:4', 'integer', 'min:1960', 'max:' . date('Y', time())],
            'mileage' => ['integer', 'min:0'],
            'price' => ['min:1', 'integer'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->getMessageBag()->getMessages()], 422));
    }
}
