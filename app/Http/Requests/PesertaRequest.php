<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PesertaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $peserta = $this->route('peserta');

        return [
                'no_peserta' => ['required', 'string', 'max:30',
                Rule::unique('peserta', 'no_peserta')->ignore($peserta?->id)],
                'nama' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email', 'max:100'],
                'no_telepon' => ['nullable', 'regex:/^[0-9+\-\s]{8,20}$/'],
                'alamat' => ['nullable', 'string'],
                'tanggal_lahir' => ['nullable', 'date', 'before:today'],
                'skema_id' => ['required', 'exists:skema_sertifikasi,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'email' => 'Format email tidak valid',
            'unique' => ':attribute sudah digunakan',
            'exists' => 'Skema yang dipilih tidak ditemukan',
            'before' => 'Tanggal lahir harus sebelum hari ini',
        ];
    }
}
