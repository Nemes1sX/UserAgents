<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'age' => ['required', 'numeric', 'between:18,80'],
            'name' => ['required', 'min:4', 'max:30'],
            'agent_id' => ['required'],
            'address' => ['present', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'regex:^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$'],
            'password' => ['present', 'min:6']
        ];
    }
}
