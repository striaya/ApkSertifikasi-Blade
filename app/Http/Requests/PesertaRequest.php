<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
                'no_peserta' => ['required', 'string', 'max:10',
                Rule::unique('pesertas', 'no_peserta')->ignore($peserta?->id)],
                'nama' => ['required', 'string', 'max:50'],
                'email' => ['required', 'email', 'max:50'],
                'no_telepon' => ['nullable', 'string', 'max:13', 'regex:/^[0-9]+$/'],
                'alamat' => ['nullable', 'string'],
                'tanggal_lahir' => ['nullable', 'date', 'before:today'],
                'skema_id' => ['required', 'exists:skemas,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'email' => 'Format email tidak valid.',
            'unique' => ':attribute sudah digunakan.',
            'exists' => 'Skema yang dipilih tidak ditemukan.',
            'before' => 'Tanggal lahir harus sebelum hari ini.',
            'no_telepon.regex' =>
                'Nomor telepon hanya boleh berisi angka 0-9.',
            'no_telepon.max' =>
                'Nomor telepon maksimal 13 digit.',
        ];
    }

    public function attributes(): array
    {
        return [
            'no_peserta' => 'Nomor Peserta',
            'nama' => 'Nama',
            'email' => 'Email',
            'no_telepon' => 'Nomor Telepon',
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'skema_id' => 'Skema Sertifikasi',
        ];
    }
}
