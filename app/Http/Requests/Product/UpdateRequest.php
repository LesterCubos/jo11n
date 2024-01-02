<?php

namespace App\Http\Requests\Product;

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
            'product_image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png',
            // 'product_sku' => 'nullable|string|min:3|max:250',
            'product_upc' => 'nullable|string|min:3|max:250',
            'product_name' => 'nullable|string|min:3|max:250',
            'product_category' => 'nullable|string|min:3|max:250',
            'expiry_date' => 'nullable|date',
            'product_weight' => 'nullable|string|min:3|max:250',
            'product_variant' => 'nullable|string|min:3|max:250',
            'packaging_type' => 'nullable|string|min:3|max:250',
            'purchase_cost' => 'nullable|string|min:1|max:10',
            'selling_cost' => 'nullable|string|min:1|max:10',
            'min_stock' => 'nullable|numeric',
        ];
    }
}
