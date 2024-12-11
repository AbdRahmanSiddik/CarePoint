<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
            'kategori' => 'required|unique:kategoris,nama_kategori|min:3'
        ];
    }

    public function messages(): array
    {
        return [
            'kategori.required' => 'Nama Kategori Harus di isi',
            'kategori.unique' => 'Nama Kategori sudah ada & digunakan',
            'kategori.min' => 'Nama Kategori minimal 3 karakter',
        ];
    }
}
