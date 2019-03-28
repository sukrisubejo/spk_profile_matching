<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\Request;
use Auth;

class PasswordRequest extends Request
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
            'password' => 'required|passcheck:' . Auth::user()->password,
            'new_password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password tidak boleh kosong',
            'password.passcheck' => 'Password Tidak Sesuai',
            'new_password.required' => 'Password baru tidak boleh kosong',
            'new_password.confirmed' => 'Konfirmasi Password baru belum diisi atau tidak sesuai',
            'new_password.min' => 'Password minimal 6 digit',
        ];
    }
}
