<?php

namespace App\Http\Requests\AdminAuth;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
            'name'=>'required|unique:admins|string|max:255',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required|min:6|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name required',
            'name.unique'=>'Name is already exist',
            'email.unique'=>'Email is already exist',
            'email.required'=>'Email required',
            'email.email'=>'Invalid Email',
            'password.required'=>'password required',
            'password.min'=>'password must than 6 letters',
        ];
    }
}
