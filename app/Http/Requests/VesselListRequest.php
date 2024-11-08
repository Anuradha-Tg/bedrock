<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VesselListRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'vessel_name'=> 'required | max:255',
            'vessel_type_id' => 'required',
            'flag_id' => 'required',
            'engine_model' => 'required',
            'status' => 'required',
        ];
    }
}
