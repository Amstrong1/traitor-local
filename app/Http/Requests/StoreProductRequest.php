<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required'],
            'name' => ['required', 'string', 'min:3', 'max:50', 'unique:products'],
            'price' => ['required', 'numeric'],
            'min_order_qte' => ['required', 'numeric'],
            'preparation_delay' => ['required', 'numeric'],
            'image' => ['required', 'image', 'max:512'],
        ];
    }
}
