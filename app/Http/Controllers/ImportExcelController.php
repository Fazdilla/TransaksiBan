<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NTImport;
use App\Imports\PemakaianImport;
use App\Imports\BanImport;
use Illuminate\Support\Facades\DB;


class ImportExcelController extends Controller
{

    public function import(Request $request)
    {
        $request->validate([
            'upload_excel' => 'required|mimes:xlsx,csv, xls'
        ]);

        $file = $request->file('upload_excel');
        
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        $folderPath = 'data_mentah_excel';
        
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath, 0777, true);  
        }

        // Menyimpan file ke folder 'data_mentah_excel'
        $filePath = $file->storeAs($folderPath, $fileName);

        File::chmod(storage_path('app/' . $folderPath), 0777);  

        // Melakukan transaksi untuk mengimpor data
        DB::beginTransaction();
        try {
            // // Mengimpor data dari Sheet 1 
            // Excel::import(new NTImport, $file);

            // // Mengimpor data dari Sheet 2 
            // Excel::import(new PemakaianImport, $file);
            Excel::import(new BanImport, $file);

            // Commit transaksi jika semuanya berhasil
            DB::commit();

            return redirect()->route('dashboard.index')->with('success', 'Data berhasil diimpor dan file disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            dd($e->getMessage());
        }
    }

}




