<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'employment_type' => 'required',
            'company_name' => 'required',
            'role' => 'required',
            'apply_url' => 'required',
            'company_logo' => 'required',
            'description' => 'required',
            'salary' => 'required',
        ];
    }
}
