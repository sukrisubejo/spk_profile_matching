<?php

namespace App\Http\Requests\Nilai;

use App\Http\Requests\Request;

class StoreRequest extends Request
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
            'id_faktor' => 'required|unique_with:nilais,id_karyawan',  
            'id_karyawan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_faktor.unique_with' => 'Faktor Ini Sudah Digunakan',
            'id_karyawan.required' => 'Nama Harus Dipilih',
        ];
    }
}
