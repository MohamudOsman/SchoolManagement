<?php

namespace App\Http\Requests\UserAuth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name'=>'required|unique:users|string|max:255',
            'email' => 'required|email|unique:users|max:255',
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
