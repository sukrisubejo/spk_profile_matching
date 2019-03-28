<?php

namespace App\Http\Requests\Manager;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
            'nip' => 'min:2|regex:/^[0-9]+$/',
            'nama' => 'min:2|regex:/^[a-z A-Z.,]+$/',
        ];
    }

    public function messages()
    {
        return [
            'nip.min' => 'Minimal Menggunakan 2 Angka',
            'nip.regex' => 'Hanya Boleh Menggunakan Angka',
            'nama.min' => 'Minimal Menggunakan 2 Huruf',
            'nama.regex' => 'Hanya Boleh Menggunakan Huruf Besar, Kecil, Koma, Titik dan Space',
        ];
    }
}
