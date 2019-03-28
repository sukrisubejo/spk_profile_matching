<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Hasil;
use App\AppModel\Karyawan;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Nilai;
use App\AppModel\Gap;
use App\AppModel\Manager;
use DB;
use App\Http\Requests;
use App\Http\Requests\Hasil\StoreRequest;
use App\Http\Requests\Hasil\UpdateRequest;
use Excel;

class HasilController extends Controller
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

        /**
        * For to Display a Eloquent into Query.
        *
        * $result = Nilai::select(DB::raw('karyawans.nama as nama, aspeks.aspek AS aspek, faktors.faktor AS faktor,faktors.nilai_sub AS nilai_sub,nilais.nilai AS nilai, (nilais.nilai - faktors.nilai_sub) AS hasil'))
             -> join('aspeks', 'nilais.id_aspeks', '=', 'aspeks.id_aspek')
             -> join('faktors', 'nilais.id_faktor', '=', 'faktors.id_faktor') //Because eloquent doesn't support using operator "USING" from query 
             -> join('karyawans', 'nilais.id_karyawan', '=', 'karyawans.id_karyawan') //Because eloquent doesn't support using operator "USING" from query 
             -> get();
        */
        $skala      = 'SELECT 
                          b.nama,
                          c.aspek,
                          d.faktor,
                          e.skala 
                        FROM 
                          nilais a
                          JOIN karyawans b USING(id_karyawan)
                          JOIN faktors d USING(id_faktor)
                          JOIN aspeks c USING(id_aspek)
                          JOIN skalas e ON e.id_skala=a.nilai
                        ORDER BY b.nama,c.aspek
                        ';
        $query    = 'SELECT 
                    nama, 
                    aspek, 
                    faktor, 
                    nilai_sub, 
                    nilai, 
                    bobot, 
                    kelompok, 
                    (nilai-nilai_sub) as hasil
                  FROM nilais
                    JOIN karyawans USING (id_karyawan)
                    JOIN faktors USING (id_faktor)
                    JOIN aspeks USING (id_aspek)
                    JOIN gaps ON selisih = (nilai - nilai_sub)';

        $query2   = 'SELECT 
                    nama, 
                    aspek,
                    SUM(IF(kelompok="core",bobot,0))/SUM(IF(kelompok="core",1,0)) AS core,
                    SUM(IF(kelompok="secondary",bobot,0))/SUM(IF(kelompok="secondary",1,0)) AS secondary
                  FROM nilais
                    JOIN karyawans USING(id_karyawan)
                    JOIN faktors USING(id_faktor)
                    JOIN aspeks USING(id_aspek)
                    JOIN gaps ON selisih=(nilai-nilai_sub)';

        $query3   = 'SELECT
                      f.nama,
                      SUM(IF(f.id_aspek=1,f.nilai,0)) AS Ni,
                      SUM(IF(f.id_aspek=2,f.nilai,0)) AS Ns,
                      SUM(IF(f.id_aspek=3,f.nilai,0)) AS Np,
                      (
                        SUM(IF(f.id_aspek=1,f.nilai*f.persen,0))+
                        SUM(IF(f.id_aspek=2,f.nilai*f.persen,0))+
                        SUM(IF(f.id_aspek=3,f.nilai*f.persen,0))
                      ) AS Hasil
                    FROM
                      (
                        SELECT 
                          b.nama,
                          c.id_aspek,
                          c.prosentase/100 AS persen,
                          (
                          SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6+
                          SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4) AS nilai  
                        FROM
                          nilais a
                          JOIN karyawans b USING(id_karyawan)
                          JOIN faktors d USING(id_faktor)
                          JOIN aspeks c USING(id_aspek)
                          JOIN gaps e ON e.selisih=(a.nilai-d.nilai_sub)
                        GROUP BY b.nama,aspek
                        ORDER BY b.nama
                      ) f
                    GROUP BY f.nama
                    ORDER BY Hasil DESC';
        $result   = DB::SELECT(DB::raw($query));
        $result1    = DB::select($skala);
        $result2  = DB::SELECT($query2);
        $result3  = DB::SELECT($query3);
        $managers = Manager::select('nip','nama')->first();
        return view('adminpanel.hasil.index', compact ('managers', 'result', 'result1', 'result2' ,'result3'));
    }

    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel($type)
    {

        $data   = Nilai::get()->toArray();
        $data1  = Karyawan::get()->toArray();
        return Excel::create('DataPenilaian', function($excel) use ($data, $data1) {
            $excel->sheet('mySheet', function($sheet) use ($data, $data1)
                {
                    $sheet->fromArray($data, $data1);
                });
        })->download($type);
    }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $jurusans = Jurusan::all();
        $pengujis = Penguji::all();
        return view('adminpanel.hasil.create', compact('jurusans', 'pengujis'));
    }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function store(StoreRequest $request)
    {
        //
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
        //
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
        //
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function destroy($id)
    {
        //
    }
}
