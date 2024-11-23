<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ruangan;

class UserRuanganController extends Controller
{

    public function index()
    {
        $users = User::with('ruangans')->get();
        return view('userRuangan.index', compact('users'));
    }

    // public function createRuangan($id)
    // {
    //     $user= User::findOrFail($id);

    //     $ruangans = Ruangan::All();
    //     return view('userRuangan.tambahruang', compact('ruangans', 'user'));
    // }
    public function tambahRuanganForm($userId)
    {
        $user = User::findOrFail($userId);
        $ruangans = Ruangan::all();

        return view('userRuangan.tambahruang', compact('user','ruangans'));
    }

    public function tambahRuanganUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $ruanganId = $request->input('ruangan_id');

        $user->ruangans()->attach($ruanganId);

        return redirect()->route('user.index')->with('success', 'Ruangan Berhasil ditambahkan ke user');
    }

    public function hapusRuanganUser($userId, $ruanganId)
    {
        $user = User::findOrFail($userId);
       
        $user->ruangans()->detach($ruanganId);

        return redirect()->route('user.index')->with('success', 'Ruangan Berhasil dihapuskan dari user');
    }
}
