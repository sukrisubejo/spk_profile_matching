<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Nilai;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Karyawan;
use DB;
use App\Http\Requests;
use App\Http\Requests\Nilai\StoreRequest;
use App\Http\Requests\Nilai\UpdateRequest;

class NilaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $query = 'SELECT
      *
      FROM
      nilais
      JOIN karyawans USING (id_karyawan)
      JOIN aspeks ON (nilais.id_aspeks = aspeks.id_aspek)
      JOIN faktors USING (id_faktor)';

      $nilais = DB::SELECT($query);

        return view('adminpanel.nilai.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aspeks = DB::table('aspeks')->pluck('aspek', 'id_aspek');
      $karyawans = Karyawan::all();
        return view('adminpanel.nilai.create', compact('aspeks', 'karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function FaktorAjax($id)
     {
         $faktors = DB::table('faktors')->where("id_aspek",$id)->pluck('faktor', 'id_faktor');
         return json_encode($faktors);
     }

    public function store(StoreRequest $request)
    {
        $nilai = new Nilai();
        $nilai->id_karyawan = $request->id_karyawan;
        $nilai->id_aspeks = $request->aspek;
        $nilai->id_faktor = $request->id_faktor;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect()->route('nilai.index')->with('alert-success', 'Berhasil Menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilais = Nilai::join('karyawans', 'nilais.id_karyawan', '=', 'karyawans.id_karyawan')
                -> join('aspeks', 'nilais.id_aspeks', '=', 'aspeks.id_aspek')
                -> join('faktors', 'nilais.id_faktor', '=', 'faktors.id_faktor')
                -> where('nilais.id', '=', $id)
                -> select('nilais.*', 'karyawans.id_karyawan AS karyawan_id', 'karyawans.nama AS karyawan_name', 'aspeks.id_aspek AS aspek_id', 'aspeks.aspek AS aspek_name', 'faktors.id_faktor AS faktor_id', 'faktors.faktor AS faktor_name')
                -> first();
        $aspeks = Aspek::all();
        $faktors = Faktor::all();
        $karyawans = Karyawan::all();
        return view('adminpanel.nilai.edit', compact('nilais', 'aspeks', 'faktors', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->id_karyawan = $request->id_karyawan;
        $nilai->id_aspeks = $request->aspek;
        $nilai->id_faktor = $request->id_faktor;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect()->route('nilai.index')->with('alert-success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Nilai::destroy($request->checkItem); 
    return back();
    }

    public function postImport()
    {
        # code...
        Excel::load(Input::file('file'), function ($reader)
        {
            # code...
            $reader->each(function($sheet)
            {
                    Aspek::firstOrCreate($sheet->toArray());
            });
        });
        echo "Success";
    }
}
