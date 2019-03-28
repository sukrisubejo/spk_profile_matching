<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Aspek;
use App\Http\Requests;
use App\Http\Requests\Aspek\StoreRequest;
use App\Http\Requests\Aspek\UpdateRequest;

class AspekController extends Controller
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
        $aspeks = Aspek::all();
        return view('adminpanel.aspek.index', compact('aspeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.aspek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $aspeks = new Aspek();
        $aspeks->aspek =  $request->aspek;
        $aspeks->prosentase = $request->prosentase;
        $aspeks->save();
        return redirect()->route('aspek.index')->with('alert-success', 'Berhasil Menambah Data');
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
        $aspeks = Aspek::findOrFail($id);
        return view('adminpanel.aspek.edit', compact('aspeks'));
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
        $aspeks = Aspek::findOrFail($id);
        $aspeks->aspek =  $request->aspek;
        $aspeks->prosentase = $request->prosentase;
        $aspeks->save();
        return redirect()->route('aspek.index')->with('alert-success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Aspek::destroy($request->checkItem); 
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
