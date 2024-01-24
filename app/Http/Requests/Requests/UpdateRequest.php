<?php

namespace App\Http\Requests\Requests;

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
            'request_date' => 'required|date',
            'requester_name' => 'required|string|min:3|max:250',
            'department' => 'required|string|min:3|max:250',
            'requester_email'  => 'required|string|min:3|max:250',
            'product_sku' => 'required|string|min:3|max:250',
            'product_category' => 'required|string|min:3|max:250',
            'product_name' => 'required|string|min:3|max:250',
            'requested_quantity' => 'required|string|min:1|max:250',
            'request_purpose'=> 'nullable|string|min:3|max:6000',
        ];
    }
}
