<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|min:3|max:70',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|max:25',
            'job' => 'nullable|max:255',
            'status' => 'nullable|in:on,off',
//            'employee_id' => 'required|exists:employees,id'
        ];
    }
}
