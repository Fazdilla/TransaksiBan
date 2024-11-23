<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['permission:ruangan.index|ruangan.create|ruangan.edit|ruangan.delete']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangans = Ruangan::orderby('nama_ruangan')->get();

        return view('ruangans.index', compact('ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangans.create');
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
            'nama_ruangan'     => 'required',
            'Keterangan'   => 'required',
        ]);

        $ruangans = Ruangan::create([
            'nama_ruangan'     => $request->nama_ruangan,
            'Keterangan'  => $request->Keterangan,
        ]);

        if($ruangans){
            //redirect dengan pesan sukses
            return redirect()->route('ruang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('ruang.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $ruang = Ruangan::findOrFail($id);
        return view('ruangans.edit', compact('ruang'));
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
            'nama_ruangan'     => 'required',
            'Keterangan'   => 'required',
        ]);

        $ruang= Ruangan::findOrFail($id);

        $ruang->update([
            'nama_ruangan'     => $request->nama_ruangan,
            'Keterangan'    => $request->Keterangan,
        ]);

        if($ruang){
            //redirect dengan pesan sukses
            return redirect()->route('ruang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('ruang.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $ruang = Ruangan::findOrFail($id);
        $ruang->delete();

        if($ruang){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
