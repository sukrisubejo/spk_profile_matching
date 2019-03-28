<?php

namespace App\Http\Requests\Aspek;

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
          'prosentase' => 'Required|regex:/^[0-9]+$/',
            'aspek' => 'Required|regex:/^[a-z A-Z]+$/',
        ];
    }

    public function messages()
    {
        return [
            'prosentase.regex' => 'Hanya Boleh Menggunakan Angka',
            'aspek.regex' => 'Hanya Boleh Menggunakan Huruf Besar/Kecil/Tanda Space',
        ];
    }
}
