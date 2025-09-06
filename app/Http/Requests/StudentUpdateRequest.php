<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        info($this->route('id'));
        return [
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email'    => 'The email must be a valid email address.',
            'email.unique'   => 'The email has already been taken.',
            'image.image'    => 'The image must be an image.',
            'image.mimes'    => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max'      => 'The image may not be greater than 2MB.',
        ];
    }
}
