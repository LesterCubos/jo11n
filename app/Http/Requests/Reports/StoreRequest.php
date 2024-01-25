<?php

namespace App\Http\Requests\Reports;

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
            'report_date' => 'required|date',
            'reporter_name' => 'required|string|min:3|max:250',
            'department' => 'required|string|min:3|max:250',
            'subject' => 'required|string|min:3|max:250',
            'details' => 'required|string|min:3|max:6000',
        ];
    }
}
