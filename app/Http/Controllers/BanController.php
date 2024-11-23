<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function index()
    {
        $bans = Ban::latest()->get();
        return view('ban.index', compact('bans'));
    }

    public function create()
    {
        return view('ban.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_seri' => 'required|string|unique:bans',
            'merek' => 'required|string',
            'ukuran' => 'required|string',
            'type' => 'required|string',
            'status_awal' => 'required|string',
        ]);

        Ban::create($validated);

        return redirect()->route('ban.index')
            ->with('success', 'Data ban berhasil ditambahkan');
    }

    public function show(Ban $ban)
    {
        return view('ban.show', compact('ban'));
    }

    public function edit(Ban $ban)
    {
        return view('ban.edit', compact('ban'));
    }

    public function update(Request $request, Ban $ban)
    {
        $validated = $request->validate([
            'no_seri' => 'required|string|unique:bans,no_seri,' . $ban->id,
            'merek' => 'required|string',
            'ukuran' => 'required|string',
            'type' => 'required|string',
            'status_awal' => 'required|string',
        ]);

        $ban->update($validated);

        return redirect()->route('ban.index')
            ->with('success', 'Data ban berhasil diperbarui');
    }

    public function destroy(Ban $ban)
    {
        $ban->delete();

        return redirect()->route('ban.index')
            ->with('success', 'Data ban berhasil dihapus');
    }
}
