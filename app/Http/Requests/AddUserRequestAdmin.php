<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequestAdmin extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'permission' => ['required', 'integer',],
        ];
    }
    
    
    public function messages()
    {
        return [
             'name.required' => 'من فضلك ادخل اسم المستخدم',
             'email.required' => 'من فضلك ادخل البريد الالكترونى',
             'password.required' => 'من فضلك ادخل الرقم السري',
             'permission.required' => 'من فضلك ادخل صلاحيه المستخدم',             
        ];
    }
}
