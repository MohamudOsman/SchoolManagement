<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSession extends FormRequest
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
            'number' => 'required',
            'day' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => trans('validation.required'),

        ];
    }
}
