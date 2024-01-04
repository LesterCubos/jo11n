<?php

namespace App\Http\Requests\ReceiveIssue;

use Illuminate\Foundation\Http\FormRequest;

class RemoveRequest extends FormRequest
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
            'curdate' => 'required|date',
            'rsmrn' => 'required|string|min:3|max:250',
            'rsku' => 'required|string|min:3|max:250',
            // 'pupc',
            'rname' => 'required|string|min:3|max:250',
            'rcat' => 'required|string|min:3|max:250',
            'rdept' => 'required|string|min:3|max:250',
            'rquantity' => 'required|string|min:1|max:250',
            'expdate' => 'required|date',
            'rnotes' => 'nullable|string|min:3|max:6000',
        ];
    }
}
