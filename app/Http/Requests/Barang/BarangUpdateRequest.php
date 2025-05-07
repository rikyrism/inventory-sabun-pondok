<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;

class BarangUpdateRequest extends FormRequest
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
            'kategori' => ['required', 'exists:tbl_kategori,id_kategori'],
            'nama_barang' => [
                'required', 
                'string', 
                'min:1', 
                'max:50',
                'unique:tbl_barang,nama_barang,' . $this->route('barang')->id_barang . ',id_barang'
            ],
            'stok_minimum' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'ukuran' => ['required'],
            'harga_barang' => ['required'],
            'nama_varian' => ['required'],
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nama_barang.unique' => 'Nama Barang (:input) Sudah Ada!',
        ];
    }
}
