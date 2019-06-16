<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseTypeRequest extends FormRequest
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
                'max:50',
                'unique:course_types,name,'
                    . ($this->courseType ? $this->courseType->id : null)
            ]
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'Ese nombre ya existe'
        ];
    }
}
