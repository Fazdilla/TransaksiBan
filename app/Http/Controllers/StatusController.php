<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware(['permission:statuses.index|statuses.create|statuses.edit|statuses.delete']);
    }

    public function index()
    {
        $statuses = Status::latest()->paginate(10);
        return view('status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'master'     => 'required',
            'status_no'     => 'required',
            'nama_status'     => 'nullable',
            'keterangan'     => 'required',
            'deskripsi'     => 'required',
        ]);

        $statuses = Status::create([
            'master'     => $request->master,
            'status_no'     => $request->status_no,
            'nama_status'     => $request->nama_status,
            'keterangan'     => $request->keterangan,
            'deskripsi'     => $request->deskripsi,

        ]);
        // $statuses = new Status;
        // $statuses->nama = $request->nama;
        // $statuses->save();

        if($statuses){
            //redirect dengan pesan sukses
            return redirect()->route('status.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('status.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $statuses = Status::findOrFail($id);
        return view('status.edit', compact('statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'master'     => 'required',
            'status_no'     => 'required',
            'nama_status'     => 'nullable',
            'keterangan'     => 'required',
            'deskripsi'     => 'required',
            
        ]);

        $statuses = Status::findOrFail($id);

        $statuses -> update([
            'master'     => $request->master,
            'status_no'     => $request->status_no,
            'nama_status'     => $request->nama_status,
            'keterangan'     => $request->keterangan,
            'deskripsi'     => $request->deskripsi,
            
        ]);

        if($statuses){
            //redirect dengan pesan sukses
            return redirect()->route('status.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('status.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statuses = Status::findOrFail($id);
        $statuses->delete();

        if($statuses){
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
