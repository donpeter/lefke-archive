<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'ref' => 'required|max:255|min:3',
            'title' => 'required|max:255|min:5',
            'desc' => 'nullable|min:5',
            'files' => 'required',
            'sender' => 'required|integer',
            'receiver' => 'required|integer',
            'type' => 'required|string',
            'prepaired_on' => 'required',
            'signed_on' => 'nullable'
        ];
    }
}