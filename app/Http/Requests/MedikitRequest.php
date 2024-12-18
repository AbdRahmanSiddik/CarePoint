<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedikitRequest extends FormRequest
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
        $isEdit = $this->route('medikit')->token_medikit;
        return [
            'kategori' => "required",
            'supplier' => "required",
            'nama_medikit' => "required|max:100",
            'thumbnail' => $isEdit ? 'nullable' : "required|image|mimes:png,jpg,jpeg",
            'deskripsi' => "required",
            'harga' => "required",
            'harga_jual' => "required",
            'stok' => "required|numeric"
        ];
        // return [];
    }

    public function messages(): array
    {
        return [
            'kategori.required' => 'pilih kategori',
            'supplier.required' => 'pilih supplier',
            'nama_medikit.required' => 'Nama medikit harus terisi',
            'nama_medikit.max' => 'Nama medikit maksimal 100 karakter',
            'thumbnail.required' => 'Thumbnail harus ada',
            'thumbnail.mimes' => 'Thumbnail harus berupa gambar (.jpg, .jpeg, .png)',
            'deskripsi.required' => 'Deskripsi harus terisi',
            'harga.required' => 'Harga harus terisi',
            'harga_jual.required' => 'Profit harus terisi',
            'stok.required' => 'Stok harus terisi',
            'stok.numeric' => 'Stok harus berupa angka positif',
        ];
    }
}
