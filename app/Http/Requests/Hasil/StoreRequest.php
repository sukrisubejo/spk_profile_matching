<?php

namespace App\Http\Requests\Hasil;

use App\Http\Requests\Request;
use App\AppModel\Pendaftar;

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
            'pendaftar_id' => 'required|unique:hasils|exists:pendaftars,id',
            'jurusan' => 'required',
            'penguji' => 'required',
            'tahun_ajaran' => 'required',
            'nilai_tpa' => 'required',
            'nilai_wawancara' => 'required',
            'nilai_uan' => 'required',
            'nilai_minat' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'pendaftar_id.required' => 'No Pendaftaran Siswa tidak boleh kosong',
            'pendaftar_id.unique' => 'No Pendaftaran sudah ada',
            'pendaftar_id.exists' => 'No Pendaftaran Siswa tidak ditemukan, periksa kembali No Pendaftaran Siswa',
            'jurusan.required' => 'Jurusan tidak boleh kosong',
            'penguji.required' => 'Penguji tidak boleh kosong',
            'tahun_ajaran.required' => 'Tahun Ajaran tidak boleh kosong',
            'nilai_tpa.required' => 'Nilai TPA tidak boleh kosong',
            'nilai_wawancara.required' => 'Nilai Wawancara tidak boleh kosong',
            'nilai_uan.required' => 'Nilai UAN tidak boleh kosong',
            'nilai_minat.required' => 'Nilai Minat tidak boleh kosong',
        ];
    }
}
