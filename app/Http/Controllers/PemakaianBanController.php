<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Cabang;
use App\Models\Kendaraan;
use App\Models\PemakaianBan;
use Illuminate\Http\Request;

class PemakaianBanController extends Controller
{
    public function index()
    {
        $pemakaianBans = PemakaianBan::with(['cabang', 'ban', 'kendaraan'])->latest()->get();
        return view('pemakaian_ban.index', compact('pemakaianBans'));
    }

    public function create()
    {
        $cabangList = Cabang::all();
        $banList = Ban::all();
        $kendaraanList = Kendaraan::all();
        return view('pemakaian_ban.create', compact('cabangList', 'banList', 'kendaraanList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_pemakaian' => 'required|date',
            'posisi_ban' => 'required|string',
            'no_wo' => 'required|string',
            'nama_status_ban' => 'required|string',
            'km_awal' => 'required|numeric',
            'km_tempuh' => 'required|numeric',
            'ketebalan' => 'required|numeric',
        ]);

        PemakaianBan::create($validated);

        return redirect()->route('pemakaian_ban.index')
            ->with('success', 'Data pemakaian ban berhasil ditambahkan');
    }

    public function show(PemakaianBan $pemakaianBan)
    {
        return view('pemakaian_ban.show', compact('pemakaianBan'));
    }

    public function edit(PemakaianBan $pemakaianBan)
    {
        $cabangList = Cabang::all();
        $banList = Ban::all();
        $kendaraanList = Kendaraan::all();
        return view('pemakaian_ban.edit', compact('pemakaianBan', 'cabangList', 'banList', 'kendaraanList'));
    }

    public function update(Request $request, PemakaianBan $pemakaianBan)
    {
        $validated = $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_pemakaian' => 'required|date',
            'posisi_ban' => 'required|string',
            'no_wo' => 'required|string',
            'nama_status_ban' => 'required|string',
            'km_awal' => 'required|numeric',
            'km_tempuh' => 'required|numeric',
            'ketebalan' => 'required|numeric',
        ]);

        $pemakaianBan->update($validated);

        return redirect()->route('pemakaian_ban.index')
            ->with('success', 'Data pemakaian ban berhasil diperbarui');
    }

    public function destroy(PemakaianBan $pemakaianBan)
    {
        $pemakaianBan->delete();

        return redirect()->route('pemakaian_ban.index')
            ->with('success', 'Data pemakaian ban berhasil dihapus');
    }
}
