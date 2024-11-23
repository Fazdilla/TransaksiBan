<?php

namespace App\Http\Controllers;

use App\Models\OtfBan;
use App\Models\Ban;
use App\Models\Cabang;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class OtfBanController extends Controller
{
    public function index()
    {
        $otfBans = OtfBan::with(['cabang', 'ban', 'kendaraan'])->latest()->get();
        return view('otfban.index', compact('otfBans'));
    }

    public function create()
    {
        $cabangs = Cabang::all();
        $bans = Ban::all();
        $kendaraans = Kendaraan::all();
        return view('otfban.create', compact('cabangs', 'bans', 'kendaraans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_otf' => 'required|date',
            'posisi_ban' => 'required|integer',
            'nama_status_ban' => 'required|string|max:255',
            'km_tempuh_otf' => 'required|integer',
            'ketebalan' => 'required|string|max:255',
        ]);

        $otfBan = OtfBan::create($validated);

        return redirect()->route('otfban.index')
            ->with('success', 'Data OTF Ban berhasil ditambahkan');
    }

    public function show(OtfBan $otfban)
    {
        return view('otfban.show', compact('otfban'));
    }

    public function edit(OtfBan $otfban)
    {
        $cabangs = Cabang::all();
        $bans = Ban::all();
        $kendaraans = Kendaraan::all();
        return view('otfban.edit', compact('otfban', 'cabangs', 'bans', 'kendaraans'));
    }

    public function update(Request $request, OtfBan $otfban)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_otf' => 'required|date',
            'posisi_ban' => 'required|integer',
            'nama_status_ban' => 'required|string|max:255',
            'km_tempuh_otf' => 'required|integer',
            'ketebalan' => 'required|string|max:255',
        ]);

        $otfban->update($validated);

        return redirect()->route('otfban.index')
            ->with('success', 'Data OTF Ban berhasil diperbarui');
    }

    public function destroy(OtfBan $otfban)
    {
        $otfban->delete();

        return redirect()->route('otfban.index')
            ->with('success', 'Data OTF Ban berhasil dihapus');
    }
}
