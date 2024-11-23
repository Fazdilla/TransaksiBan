<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LepasBan;
use App\Models\Ban;
use App\Models\Kendaraan;
use App\Models\Cabang;

class LepasBanController extends Controller
{
    public function index()
    {
        $lepasBans = LepasBan::with(['cabang', 'ban', 'kendaraan'])->paginate(10);

        return view('lepas_ban.index', compact('lepasBans'));
    }

    /**
     * Form tambah LepasBan
     */
    public function create()
    {
        $cabangList = Cabang::all();
        $banList = Ban::all();
        $kendaraanList = Kendaraan::all();

        return view('lepas_ban.create', compact('cabangList', 'banList', 'kendaraanList'));
    }

    /**
     * Simpan data baru LepasBan
     */
    public function store(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_pelepasan' => 'required|date',
            'posisi_ban' => 'required|string',
            'status_ban_lepas' => 'required|string',
            'status_sebelum_lepas' => 'nullable|string',
            'tindakan_akhir' => 'nullable|string',
            'vulkanisir_ke' => 'nullable|integer',
            'ketebalan_sebelum_lepas' => 'nullable|string',
            'tgl_ketebalan_sebelum_lepas' => 'nullable|date',
            'ketebalan_lepas' => 'nullable|string',
            'alasan_lepas' => 'nullable|string',
            'supplier_ban' => 'nullable|string',
            'km_akhir' => 'nullable|integer',
            'km_pasang' => 'nullable|integer',
            'km_tempuh' => 'nullable|integer',
            'ketebalan_pasang' => 'nullable|string',
            'tanggal_pasang_ban' => 'nullable|date',
            'ukuran_ban' => 'nullable|string',
            'konsumsi_ketebalan' => 'nullable|string',
            'waktu_pakai_ban' => 'nullable|integer',
            'umur_ban' => 'nullable|integer',
            'jenis_telapak' => 'nullable|string',
        ]);

        LepasBan::create($request->all());

        return redirect()->route('lepas_ban.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail LepasBan
     */
    public function show($id)
    {
        $lepasBan = LepasBan::with(['cabang', 'ban', 'kendaraan'])->findOrFail($id);

        return view('lepas_ban.show', compact('lepasBan'));
    }

    /**
     * Form edit LepasBan
     */
    public function edit($id)
    {
        $lepasBan = LepasBan::findOrFail($id);
        $cabangList = Cabang::all();
        $banList = Ban::all();
        $kendaraanList = Kendaraan::all();

        return view('lepas_ban.edit', compact('lepasBan', 'cabangList', 'banList', 'kendaraanList'));
    }

    /**
     * Update data LepasBan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cabang_id' => 'required|exists:cabangs,id',
            'ban_id' => 'required|exists:bans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_pelepasan' => 'required|date',
            'posisi_ban' => 'required|string',
            'status_ban_lepas' => 'required|string',
            'status_sebelum_lepas' => 'nullable|string',
            'tindakan_akhir' => 'nullable|string',
            'vulkanisir_ke' => 'nullable|integer',
            'ketebalan_sebelum_lepas' => 'nullable|string',
            'tgl_ketebalan_sebelum_lepas' => 'nullable|date',
            'ketebalan_lepas' => 'nullable|string',
            'alasan_lepas' => 'nullable|string',
            'supplier_ban' => 'nullable|string',
            'km_akhir' => 'nullable|integer',
            'km_pasang' => 'nullable|integer',
            'km_tempuh' => 'nullable|integer',
            'ketebalan_pasang' => 'nullable|string',
            'tanggal_pasang_ban' => 'nullable|date',
            'ukuran_ban' => 'nullable|string',
            'konsumsi_ketebalan' => 'nullable|string',
            'waktu_pakai_ban' => 'nullable|integer',
            'umur_ban' => 'nullable|integer',
            'jenis_telapak' => 'nullable|string',
        ]);

        $lepasBan = LepasBan::findOrFail($id);
        $lepasBan->update($request->all());

        return redirect()->route('lepas_ban.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus LepasBan
     */
    public function destroy($id)
    {
        $lepasBan = LepasBan::findOrFail($id);
        $lepasBan->delete();

        return redirect()->route('lepas_ban.index')->with('success', 'Data berhasil dihapus.');
    }
}
