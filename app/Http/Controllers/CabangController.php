<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::latest()->get();
        return view('cabang.index', compact('cabangs'));
    }

    public function create()
    {
        return view('cabang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);

        Cabang::create($validated);

        return redirect()->route('cabang.index')
            ->with('success', 'Data cabang berhasil ditambahkan');
    }

    public function show(Cabang $cabang)
    {
        return view('cabang.show', compact('cabang'));
    }

    public function edit(Cabang $cabang)
    {
        return view('cabang.edit', compact('cabang'));
    }

    public function update(Request $request, Cabang $cabang)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);

        $cabang->update($validated);

        return redirect()->route('cabang.index')
            ->with('success', 'Data cabang berhasil diperbarui');
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();

        return redirect()->route('cabang.index')
            ->with('success', 'Data cabang berhasil dihapus');
    }
}
