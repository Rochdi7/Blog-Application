<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change if using auth/roles
    }

    public function rules(): array
    {
        $categoryId = $this->route('id'); // Get the route parameter (category ID)

        return [
            'name' => 'required|string|unique:categories,name,' . $categoryId,
            'description' => 'nullable|string|max:1000',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The category name is required.',
            'name.unique' => 'This name is already taken by another category.',
        ];
    }
}
