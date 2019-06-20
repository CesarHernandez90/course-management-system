<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                'max:50'
            ],
            'schedule' => [
                'max:150'
            ],
            'id_course_type' => [
                'required'
            ],
            'id_period' => [
                'required'
            ],
            'id_department' => [
                'required'
            ]
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'schedule.max' => 'La descripción del horario contiene demasiados caracteres',
            'id_course_type' => 'El tipo de curso es obligatorio',
            'id_period' => 'El periodo es obligatorio',
        ];
    }
}
