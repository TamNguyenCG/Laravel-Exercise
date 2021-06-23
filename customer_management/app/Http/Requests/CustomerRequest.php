<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:20|regex:/^([^0-9]*)$/ ',
            'email' => 'required|email:filter|min:15',
            'dob'=>'required|before_or_equal:today'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Must fill in the name field",
            'name.min' => 'Must be over 5 characters',
            'name.max' => 'Must be under 20 characters',
            'name.regex'=>'Must not include number',
            'email.required'=>'Must fill in the email field',
            'email.email' => "Wrong type of email address",
            'email.min'=>"Invalid email",
            'dob.required'=>"Must fill in the date of birth field",
            'dob.before_or_equal'=>'Must not over today'
        ];
    }
}
