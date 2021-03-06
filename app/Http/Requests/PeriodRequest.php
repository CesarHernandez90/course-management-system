<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodRequest extends FormRequest
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
            'name' => [
                'required',
                'max:150'
            ],
            'start' => [
                'required'
            ],
            'end' => [
                'required'
            ]
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'start.required' => 'La fecha de inicio es obligatoria',
            'end.required' => 'La fecha de cierre es obligatoria'
        ];
    }
}
