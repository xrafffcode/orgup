<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstructorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => request()->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string',
            'email' => request()->isMethod('post') ? 'required|email|unique:users,email' : ['nullable', 'email', Rule::unique('users', 'email')->ignore(request()->route('mentor'))],
            'password' => request()->isMethod('post') ? 'required|string' : 'nullable|string',
            'description' => 'required|string|max:255',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'avatar' => 'Avatar',
            'name' => 'Nama Lengkap',
            'email' => 'Email',
            'password' => 'Password',
            'description' => 'Deskripsi',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'avatar.required' => 'Avatar harus diisi',
            'avatar.image' => 'Avatar harus berupa gambar',
            'avatar.mimes' => 'Avatar harus berupa gambar jpg, jpeg, atau png',
            'avatar.max' => 'Avatar maksimal 2 MB',
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.string' => 'Password harus berupa teks',
            'description.required' => 'Deskripsi harus diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'description.max' => 'Deskripsi maksimal 255 karakter',
        ];
    }
}
