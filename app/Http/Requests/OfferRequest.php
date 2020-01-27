<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
                'desc' => ['required', 'string', 'max:255'],
                'attachments.*' => ['mimes:jpeg,png,jpg,pdf,txt,docx', 'max:10000'],
                'values.*' => ['required', 'integer'],
                'milestones.*' => ['required', 'string'],
            ];
    }
}
