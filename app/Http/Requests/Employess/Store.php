<?php

namespace App\Http\Requests\Employess;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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
            'firstname' => 'required|max:50|min:3|string',
            'lastname' => 'required|min:3|string',
            'email' => 'required|string|max:100|min:3|unique:employees',
            'password' => 'required|min:9|max:100|string',
            'type' => ['required',Rule::in(['admin','super_admin','manager','employee'])]
        ];
    }
}
