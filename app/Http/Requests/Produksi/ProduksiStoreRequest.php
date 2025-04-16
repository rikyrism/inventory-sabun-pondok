<?php

namespace App\Http\Requests\Produksi;

use Illuminate\Foundation\Http\FormRequest;

class ProduksiStoreRequest extends FormRequest
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
            'id_produksi' => ['required'],
            'nama_barang' => ['required', 'string', 'min:1', 'max:50'],
            'satuan' => ['required', 'string', 'min:1', 'max:10'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'status' => ['required', 'string', 'min:1', 'max:10']
        ];
    }
}
