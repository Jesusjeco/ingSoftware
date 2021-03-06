<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'last_name' => [
                'required',
            ],
            'birthday' => [
                'required',
            ],
            'address' => [
                'present',
            ],
            'number' => [
                'present',
            ],
            'email' => [
                'present',
            ],
        ];
    }
}
