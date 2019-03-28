<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Gap;
use App\Http\Requests;
use App\Http\Requests\Gap\StoreRequest;
use App\Http\Requests\Gap\UpdateRequest;

class GapController extends Controller
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
        $gaps = Gap::all();
        return view('adminpanel.gap.index', compact('gaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.gap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $gaps = new Gap();
        $gaps->selisih =  $request->selisih;
        $gaps->bobot = $request->bobot;
        $gaps->keterangan = $request->keterangan;
        $gaps->save();
        return redirect()->route('gap.index')->with('alert-success', 'Insert Success');
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
        $gaps = Gap::findOrFail($id);
        return view('adminpanel.gap.edit', compact('gaps'));
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
        $gaps = Gap::findOrFail($id);
        $gaps->selisih =  $request->selisih;
        $gaps->bobot = $request->bobot;
        $gaps->keterangan = $request->keterangan;
        $gaps->save();
        return redirect()->route('gap.index')->with('alert-success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gap::destroy($request->checkItem); 
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
