<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = auth()->id();
        return [
            'name' => 'required|string|max:190',
            'username' => 'required|string|max:190|unique:users,username,'.$id,
            'email' => 'required|string|email|max:190|unique:users,email,'.$id,
            'phone' => 'nullable|max:190',
            'address' => 'nullable|string|max:190',
            'description' => 'nullable|string|max:1000',
            'date_of_birth' => 'nullable|date_format:d/m/Y',
            'sex' => 'nullable|in:Male,Female',
            'private' => 'nullable|in:1,0',
            'current_password' => ['required', 'nullable', new CurrentPassword()],
            'password' => 'nullable|min:8|max:50|confirmed'
        ];
    }
}
