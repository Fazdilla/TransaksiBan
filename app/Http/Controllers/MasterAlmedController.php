<?php

namespace App\Http\Controllers;

use App\Models\MasterAlmed;
use Illuminate\Http\Request;

class MasterAlmedController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:almed.index|almed.create|almed.edit|almed.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almeds = MasterAlmed::all();

        return view('almed.index', compact('almeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_almed'     => 'required',
            'keterangan'   => 'required',
        ]);

        $ruangans = MasterAlmed::create([
            'nama_almed'     => $request->nama_almed,
            'keterangan'  => $request->keterangan,
        ]);

        if ($ruangans) {
            //redirect dengan pesan sukses
            return redirect()->route('almed.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('almed.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        $almed = MasterAlmed::findOrFail($id);
        return view('almed.edit', compact('almed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama_almed'     => 'required',
            'keterangan'   => 'required',
        ]);

        $almed = MasterAlmed::findOrFail($id);

        $almed->update([
            'nama_almed'     => $request->nama_almed,
            'keterangan'    => $request->keterangan,
        ]);

        if ($almed) {
            //redirect dengan pesan sukses
            return redirect()->route('almed.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('almed.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almed = MasterAlmed::findOrFail($id);
        $almed->delete();

        if ($ruang) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
