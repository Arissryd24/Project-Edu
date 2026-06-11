<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketingUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $id = $this->route('marketing_user')?->id ?? null;

        return [
            // Nama minimal 3 huruf
            'name' => ['required', 'string', 'min:3', 'max:255'], 
            
            // Email harus format email dan unik
            'email' => ['required', 'email', 'max:255', $id ? "unique:users,email,$id" : 'unique:users,email'],
            
            // Password minimal 8 karakter, wajib huruf + angka
            'password' => [
                $id ? 'nullable' : 'required', 
                'string', 
                'min:8', 
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/' 
            ],

            // TAMBAHKAN INI AGAR TIDAK ERROR:
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
            'document' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'Nama minimal harus 3 huruf ya, jangan disingkat!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.regex' => 'Password harus campuran huruf dan angka, nggak boleh angka doang!',
            'email.email' => 'Format email salah, harus pake @ ya!',
            'email.unique' => 'Email ini sudah terdaftar, pakai email lain ya!',
            'image.image' => 'Foto harus berupa gambar ya!',
            'image.mimes' => 'Foto harus berformat jpeg, png, jpg, gif, atau svg!',
            'image.max' => 'Foto maksimal 2MB ya!',
            'document.file' => 'Dokumen harus berupa file ya!',
            'document.mimes' => 'Dokumen harus berformat pdf, doc, atau docx!',
        ];
    }
} // Pastikan kurung penutup class ini ada