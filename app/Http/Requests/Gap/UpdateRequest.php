<?php

namespace App\Http\Requests\Gap;

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
          'selisih' => 'regex:/^[0-9-]+$/',
          'bobot' => 'Required|regex:/^[0-9.]+$/',
          'keterangan' => 'Required|regex:/^[a-z A-Z(),0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
          'selisih.unique' => 'Nilai Selisih Tidak Boleh Sama',
          'selisih.regex' => 'Hanya Boleh Menggunakan Angka dan Tanda -',
          'bobot.regex' => 'Hanya Boleh Menggunakan Angka dan Tanda Titik',
          'keterangan.regex' => 'Hanya Boleh Menggunakan Huruf Besar/Kecil/Angka/Tanda Space/Tanda Kurung/Tanda Koma',
      ];
    }
}
