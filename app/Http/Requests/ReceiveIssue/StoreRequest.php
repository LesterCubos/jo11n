<?php

namespace App\Http\Requests\ReceiveIssue;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date' => 'required|date',
            'smrn' => 'required|string|min:3|max:250',
            'psku' => 'required|string|min:3|max:250',
            // 'pupc',
            'pname' => 'required|string|min:3|max:250',
            'pcategory' => 'required|string|min:3|max:250',
            'department' => 'required|string|min:3|max:250',
            'sname' => 'required|string|min:3|max:250',
            'quantity' => 'required|string|min:1|max:250',
            'purchase_cost' => 'required|string|min:1|max:10',
            'selling_cost' => 'required|string|min:1|max:10',
            'expiry_date' => 'nullable|date|after:today',
            'notes' => 'nullable|string|min:3|max:6000',
            'issuetype' => 'nullable|string|min:1|max:250',
        ];
    }
}
