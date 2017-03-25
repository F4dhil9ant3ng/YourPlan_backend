<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_user' => 'required',
            'plan_name' => 'required',
            'plan_place' => 'required',
            'plan_address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'time_to_prepare' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i'
        ];
    }
}
