<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Karyawan;
use App\Http\Requests;
use App\Http\Requests\Karyawan\StoreRequest;
use App\Http\Requests\Karyawan\UpdateRequest;
use App\AppModel\Aspek;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
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
        $karyawans = Karyawan::all();
        return view('adminpanel.karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $karyawans = new Karyawan();
        $karyawans->id_karyawan =  $request->id_karyawan;
        $karyawans->nama =  $request->nama;
        $karyawans->tempat_lahir = $request->tempat_lahir;
        $karyawans->tgl_lahir = $request->tgl_lahir;
        $karyawans->kelamin = $request->kelamin;
        $karyawans->agama = $request->agama;
        $karyawans->phone = $request->phone;
        $karyawans->save();
        return redirect()->route('karyawan.index')->with('alert-success', 'Berhasil Menambah Data');
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
        $karyawans = Karyawan::findOrFail($id);
        return view('adminpanel.karyawan.edit', compact('karyawans'));
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
        $karyawans = Karyawan::findOrFail($id);
        $karyawans->id_karyawan =  $request->id_karyawan;
        $karyawans->nama =  $request->nama;
        $karyawans->tempat_lahir = $request->tempat_lahir;
        $karyawans->tgl_lahir = $request->tgl_lahir;
        $karyawans->kelamin = $request->kelamin;
        $karyawans->agama = $request->agama;
        $karyawans->phone = $request->phone;
        $karyawans->save();
        return redirect()->route('karyawan.index')->with('alert-success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Karyawan::destroy($request->checkItem); 
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