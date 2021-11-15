<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreAndUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'required|integer',
            'fuel_type_id' => 'required|integer',
            'gear_type_id' => 'required|integer',
            'class_group_id' => 'required|integer',
            'driver_licence_age' => 'required|integer',
            'kilometer' => 'required|numeric|between:1,99999999',
            'vote' => 'required|integer',
            'deposit' => 'required|numeric|between:0,9999999.99',
            'price' => 'required|numeric|between:0,9999999.99'
        ];
    }


    public function attributes(): array
    {
        return [
            'brand_id' => 'Marka',
            'fuel_type_id' => 'Yakı Tipi',
            'gear_type_id' => 'Vites Tipi',
            'class_group_id' => 'Sınıf Grubu',
            'driver_licence_age' => 'Ehliyet Yaşı',
            'kilometer' => 'Kilometre',
            'vote' => 'Puan',
            'deposit' => 'Depozito',
            'price' => 'Fiyat',
        ];
    }
}
