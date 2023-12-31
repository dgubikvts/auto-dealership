<?php

namespace App\Http\Requests;

use App\Rules\BrandExists;
use App\Rules\EnumExists;
use App\Rules\VehicleExists;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VehicleStoreRequest extends FormRequest
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
            'brand_id' => ['required', new BrandExists],
            'vehicle_type' => ['required', new EnumExists],
            'wheels' => ['required', new EnumExists],
            'transmission' => ['required', new EnumExists],
            'fuel' => ['required', new EnumExists],
            'model' => ['required', 'min:2', 'max:25'],
            'year' => ['required', 'digits:4', 'integer', 'min:1960', 'max:' . date('Y', time())],
            'mileage' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'min:1', 'integer'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->getMessageBag()->getMessages()], 422));
    }
}
