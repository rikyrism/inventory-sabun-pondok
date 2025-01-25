<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'nama_user' => ['required', 'string', 'min:1', 'max:255'],
            'username' => ['required', 'string', 'min:1', 'max:255'],
            'hak_akses' => ['required', 'string', 'in:Administrator,Kepala Produksi'],
            'password' => ['nullable', 'string', 'min:1', 'max:255'],
        ];
    }
}
