<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier' => 'required',
            'kontak' => 'required',
            'alamat' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'supplier.required' => 'Nama supplier harus terisi',
            'kontak.required' => 'Kontak supplier harus terisi',
            'alamat.required' => 'Alamat supplier harus terisi',
        ];
    }
}
