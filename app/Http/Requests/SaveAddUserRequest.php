<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveAddUserRequest extends FormRequest
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
                'min:6',
            ],
            
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id),
                'email'
            ],
            'password' => [
                'required',
                'min:6',
                
            ],
            'password2' => [
                'required',
                'min:6',
                'same:password'
            ],

        ];
    }
    
    public function messages()
    {
        return  [

            'name.required' => 'Vui lòng nhập tên tài khoản ',
            'email.required' => 'Vui lòng nhập tên email ',
            'password.required' => 'Vui lòng nhập mật khẩu ',
            'password2.required' => 'Vui lòng nhập lại mật khẩu ',
            
        ];
    }
}
