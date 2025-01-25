<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;

class BarangStoreRequest extends FormRequest
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
            'id_barang' => ['required'],
            'nama_barang' => ['required', 'string', 'min:1', 'max:50'],
            'stok_minimum' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'satuan' => ['required', 'string', 'min:1', 'max:10']
        ];
    }
}
