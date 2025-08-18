<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'file' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp,txt,zip|max:5120',
            'assigned_users' => 'nullable|array',
            'assigned_users.*' => 'exists:users,id'
        ];
    }
}
