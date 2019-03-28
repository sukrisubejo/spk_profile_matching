<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\AppModel\Hasil;
use App\AppModel\Karyawan;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Nilai;
use App\AppModel\Gap;
use DB;
use App\AppModel\Manager;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
          $result1  = DB::select($skala);
          $result2  = DB::SELECT($query2);
          $result3  = DB::SELECT($query3);

          return view('home', compact('managers', 'result', 'result1', 'result2', 'result3'));
    }
}
