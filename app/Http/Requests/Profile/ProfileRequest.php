<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\Request;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:2|regex:/^[a-z A-Z]+$/',
            'email' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'name.min' => 'Minimal Menggunakan 2 Karakter',
            'name.regex' => 'Hanya Boleh Menggunakan Huruf',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format Email tidak sesuai, example : admin@admin.com',
        ];
    }
}
