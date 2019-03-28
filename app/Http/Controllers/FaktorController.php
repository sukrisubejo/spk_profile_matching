<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Faktor;
use App\AppModel\Aspek;
use DB;
use App\Http\Requests;
use App\Http\Requests\Faktor\StoreRequest;
use App\Http\Requests\Faktor\UpdateRequest;

class FaktorController extends Controller
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
      $faktor = 'SELECT
      *
      FROM
      faktors
      JOIN aspeks USING (id_aspek)';

      $faktors = DB::SELECT($faktor);

        return view('adminpanel.faktor.index', compact('faktors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aspeks = Aspek::pluck('aspek', 'id_aspek');
      $Faktors = Faktor::all();
        return view('adminpanel.faktor.create', compact('aspeks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $faktors = new Faktor();
        $faktors->id_aspek = $request->aspek;
        $faktors->faktor = $request->faktor;
        $faktors->nilai_sub = $request->nilai;
        $faktors->kelompok = $request->kelompok;
        $faktors->save();
        return redirect()->route('faktor.index')->with('alert-success', 'Input Success');
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
        $faktors = Faktor::join('aspeks', 'faktors.id_aspek', '=', 'aspeks.id_aspek')
                -> SELECT('faktors.*', 'faktors.id_aspek as aspekid', 'aspeks.aspek as aspek')
                -> where('faktors.id_faktor', '=', $id)
                -> first();
        $aspeks = Aspek::all();
        return view('adminpanel.faktor.edit', compact('faktors', 'aspeks'));
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
        $faktors = Faktor::findOrFail($id);
        $faktors->id_aspek = $request->aspek;
        $faktors->faktor = $request->faktor;
        $faktors->nilai_sub = $request->nilai;
        $faktors->kelompok = $request->kelompok;
        $faktors->save();
        return redirect()->route('faktor.index')->with('alert-success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Faktor::destroy($request->checkItem); 
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
