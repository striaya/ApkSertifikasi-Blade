<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SkemaRequest extends FormRequest
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
        $skema = $this->route('skema');

        return [
            'kode_skema' => ['required', 'string', 'max:30',
                Rule::unique('skema_sertifikasi', 'kode_skema')->ignore($skema?->id)],
            'nama_skema' => ['required', 'string', 'max:150'],
            'deskripsi' => ['nullable', 'string'],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute sudah digunakan',
        ];
    }
}
