<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user()->is_admin;
        return $user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category_id" => "required|numeric",
            "title" => "required|string|min:8",
            "description" => "required|string",
            "image" => "required",
            "year" => "required",
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'A category is required',
            'category_id.decimal' => 'Category shoud be a number',
            'title.required' => 'A title is required',
            "title.string" => "Title should be a string",
            "tile.max" => "Title min length must be 8",
            'description.required' => 'A message is required',
            "description.string" => "Description should be a string",
            "image.required" => "A image is required",
            "year.required" => "A year is required",
        ];

    }
}
