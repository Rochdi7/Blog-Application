<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users (or apply logic here)
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string|max:1000',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a category name.',
            'name.unique' => 'This category name already exists.',
        ];
    }
}
