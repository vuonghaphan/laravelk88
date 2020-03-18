<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'=>'required|email|unique',
            'password'=>'required|confirmed',
            'full'=>'required|min:4',
            'address'=>'required|digits_between:5,20',
            'phone'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
        ];
    }
}
