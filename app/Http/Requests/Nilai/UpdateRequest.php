<?php

namespace App\Http\Requests\Nilai;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;
use App\AppModel\Nilai;

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
            'id_faktor'      => 'required|unique:nilais,id_faktor,'.$this->getSegmentFromEnd().',id,id_karyawan,'.$this->get('id_karyawan'),
        ];
    }

    private function getSegmentFromEnd($position_from_end = 1) 
    {
        $segments =$this->segments();
        return $segments[sizeof($segments) - $position_from_end];
    }

    public function messages()
    {
        return [
            'id_faktor.unique' => 'Faktor Sudah Digunakan',
            'id_karyawan.required' => 'Nama Harus Dipilih',
        ];
    }
}
