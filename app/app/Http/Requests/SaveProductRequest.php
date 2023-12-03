<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProductRequest extends FormRequest
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
        return [
            'article' => ['required', 'max:255', 'regex:/^[a-zA-Z0-9]+$/', Rule::unique('products', 'article')->ignore($this->id)],
            'name' => 'required|min:10|max:255',
            'status' => Rule::in(['available', 'unavailable']),
            'key' => 'array',
            'key.*' => 'min:1',
            'value' => 'array',
            'value.*' => 'min:1',
        ];
    }
}
