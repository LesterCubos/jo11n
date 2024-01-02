<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'supplier_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
            'supplier_name' => 'nullable|string|min:3|max:250',
            'supplier_email' => 'nullable|string|min:3|max:250',
            'supplier_kpn' => 'nullable|string|min:3|max:250',
            'supplier_address' => 'nullable|string|min:3|max:250',
            'supplier_number' => 'nullable|string|min:8|max:11',
            'emergency_contact' => 'nullable|string|min:3|max:250',
            'econtact_number' => 'nullable|string|min:8|max:11',
        ];
    }
}
