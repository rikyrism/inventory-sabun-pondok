<?php

namespace App\Http\Requests\BarangKeluar;

use Illuminate\Foundation\Http\FormRequest;

class BarangKeluarStoreRequest extends FormRequest
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
            'unique_id' => ['nullable', 'string', 'min:1', 'max:255'],
            'barang_id' => ['required', 'exists:barangs,id'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'integer', 'min:-2147483648', 'max:2147483647']
        ];
    }
}
