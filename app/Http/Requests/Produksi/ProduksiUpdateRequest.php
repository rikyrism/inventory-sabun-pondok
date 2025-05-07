<?php

namespace App\Http\Requests\Produksi;

use Illuminate\Foundation\Http\FormRequest;

class ProduksiUpdateRequest extends FormRequest
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
            'nama_barang' => [
                'required', 
                'string', 
                'min:1', 
                'max:50',
                'unique:tbl_produksi,nama_barang,' . $this->route('produksi')->id_produksi . ',id_produksi'
            ],
            'satuan' => ['required', 'string', 'min:1', 'max:10'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'status' => ['required', 'string', 'min:1', 'max:10']
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
            'nama_barang.unique' => 'Produksi (:input) Sudah Ada!',
        ];
    }
}
