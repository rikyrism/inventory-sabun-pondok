<?php

namespace App\Http\Requests\BarangMasuk;

use Illuminate\Foundation\Http\FormRequest;

class BarangMasukStoreRequest extends FormRequest
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
            'id_masuk' => ['nullable', 'string', 'min:1', 'max:255'],
            'barang' => ['required', 'exists:tbl_barang,id_barang'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:-2147483648', 'max:2147483647'],
            'penerima_masuk' => ['required'],
        ];
    }
}
