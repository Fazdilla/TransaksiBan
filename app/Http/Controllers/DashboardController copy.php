<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['permission:dashboard.index|dashboard.create|dashboard.edit|dashboard.delete']);
    // }

    // public function index()
    public function index(Request $request)
    {
        $date = $request->month;
        // $today = Carbon::today(); 
        $today = Carbon::create(2024, 11, 10);
        // Ambil data dari Tabel1 dan Tabel2 untuk ditampilkan
        $datastok = DB::table('n_t_s')
            ->leftJoin('pemakaians', function ($join) use($today) {
                $join->on('n_t_s.nomor_seri_diterima', '=', 'pemakaians.no_seri_ban')
                    ->whereDate('pemakaians.created_at', '=', $today);
            })
            
            ->select('n_t_s.*', 'pemakaians.nopol', 'pemakaians.kapasitas', 'pemakaians.tanggal_pemakaian')
            ->get();

        foreach ($datastok as $item) {
            if (!$item->nopol) {
                $item->nopol = 'READY STOK';
            }
            if (!$item->kapasitas) {
                $item->kapasitas = 'READY STOK';
            }
            // if (!$item->tanggal_pemakaian) {
            //     $item->tanggal_pemakaian = 'READY STOK';
            // }
        }

        return view('dashboard.index', compact('datastok'));
    }

    public function upload(){
        return view('dashboard.upload');
    }
}
