<?php

namespace App\Http\Requests\Order;

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
            'orsku' => 'required|string|min:3|max:250',
            'orsupname' => 'required|string|min:3|max:250',
            'orsupnumber' => 'required|string|min:8|max:11',
            'ordate' => 'required|date',
            'orpname' => 'required|string|min:3|max:250',
            'orpcat' => 'required|string|min:3|max:250',
            'orpdept' => 'required|string|min:3|max:250',
            'orpmins' => 'required|numeric',
            'orpcurs' => 'required|numeric',
            'orstatus' => 'required|numeric',
        ];
    }
}
