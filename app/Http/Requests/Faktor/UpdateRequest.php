<?php

namespace App\Http\Requests\Faktor;

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
          'faktor' => 'min:2|regex:/^[a-z A-Z]+$/',
        ];
    }

    public function messages()
    {
        return [
            'faktor.min' => 'Minimal Menggunakan 2 Huruf',
            'faktor.regex' => 'Hanya Boleh Menggunakan Huruf Besar, Kecil dan Space',
        ];
    }
}
