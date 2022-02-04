<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => 'nullable|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(6)],
            'phone' => 'required|string|unique:users',
            'address' => 'required|string',
            'city' => 'required|string',
            'country_id' => 'required|numeric|exists:countries,id',
            'state_id' => 'required|numeric|exists:states,id',
            'zipcode' => 'required|string',
            'hear_about_us' => 'nullable|string',
            'hear_about_us_text' => 'nullable|string',
            'feedback' => 'nullable|string',
            'terms' => 'nullable|numeric|in:0,1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_id.required' => 'Select Country',
            'state_id.required' => 'Select State',
        ];
    }
}
