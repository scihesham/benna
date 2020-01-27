<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                'title' => ['required', 'string', 'max:255'],
                'city' => ['required', 'numeric'],
                'category' => ['required', 'numeric'],
//                'expecttime' => ['nullable', 'numeric'],
                'expectbudget' => ['nullable', 'numeric'],
                'desc' => ['required', 'string'],
                'attachments.*' => ['mimes:jpeg,png,jpg,pdf,txt,docx', 'max:10000'],
            ];

    }
}
