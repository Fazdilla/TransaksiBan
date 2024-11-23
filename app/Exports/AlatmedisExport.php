<?php

namespace App\Exports;

//aktifkan otentikasi
use illuminate\support\Facades\Auth;

//akses model yang ingin diekspor
use App\Models\AlatMedis;
use App\Models\MasterAlmed;
use App\Models\Status;
use App\Models\Ruangan;
use Illuminate\Contracts\View\View;

//export excel berdasarkan query 
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithMapping;
//use Maatwebsite\Excel\Concerns\FromView;

//menambah header dan foooter dan akses ke storage
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

//add image
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class AlatmedisExport implements FromQuery, WithMapping, WithHeadings, WithEvents, WithDrawings, ShouldAutoSize, WithColumnFormatting
{
    use Exportable;
    protected $counter = 1;

// Jika ingin cetak excel berdasarkan kondisi dari request user
    // protected $condition;

    // public function __construct($condition)
    // {
    //     $this->condition = $condition;
    // }

    // public function query()
    // {
    //     return DB::table('your_table')
    //         ->select('column1', 'column2', 'column3')
    //         ->where('condition_column', $this->condition);
    // }

    public function query()
    {
        $user = Auth::user(); 
        if (Auth::user()->hasRole('user')) {

            $alatmedis = AlatMedis::query();
            


            return $alatmedis;
        } else {
            $alatmedis = AlatMedis::select('almed_id', 'no_seri', 'model', 'merk', 'kode_barang', 'pt', 'deskripsi', 'ruang_id', 'tgl_diterima')
            ->whereHas('ruang.users', function ($query) use ($user){
                $query->where('users.id', $user->id);
            })
            ->get();

            // return Alatmedis::query();
            return $alatmedis;
        }
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_CURRENCY_EUR_INTEGER,
        ];
    }

    // public function map($row): array
    // {
    //     // Menggabungkan nilai dari tiga kolom menjadi satu kolom
    //     // $combinedValue = $row->column1 . ' ' . $row->column2 . ' ' . $row->column3;
    //     $kolomSatu= $row->almed->nama_almed . ' ' . $row->kode_barang;
    //     $kolomDua= $row->no_seri . ' ' . $row->model. ' ' . $row->merk. ' ' . $row->pt;
    //     $kolomTiga= $row->deskripsi;
    //     $kolomEmpat= $row->ruang->nama_ruangan;

    //     return [
    //         'nama' => $kolomSatu,
    //         'detail' => $kolomDua,
    //         'deskripsi' => $kolomTiga,
    //         'milik' => $kolomEmpat,
    //     ];
    // }

    public function map($row): array
    {
        // Menggabungkan nilai dari tiga kolom menjadi satu kolom
        // $combinedValue = $row->column1 . ' ' . $row->column2 . ' ' . $row->column3;
        // $kolomSatu= $row->almed->nama_almed . ' ' . $row->kode_barang;
        // $kolomDua= $row->no_seri . ' ' . $row->model. ' ' . $row->merk. ' ' . $row->pt;
        // $kolomTiga= $row->deskripsi;
        // $kolomEmpat= $row->ruang->nama_ruangan;

        return [
            $this->counter++,
           'tes1' => $row->almed->nama_almed,
           'tes2' => $row->kode_barang,
           'tes3' => $row->no_seri ,
           'tes4' => $row->model,
           'tes5' => $row->merk,
           'tes6' => $row->pt,
           'tes7' => $row->deskripsi,
           'tes8' => $row->ruang->nama_ruangan,
           'sas' => public_path('assets/img/logo.png'),
        ];
    }

    public function headings(): array
    {
        return [
            ['#', 'Nama Alat', '',
            'Detail', '', '', '',
            'Deskripsi',
            'Milik Ruangan'],
            [
                '','tes1', 'tes2', 'tes3', 'tes4', 'tes5', 'tes6', 'tes7', 'tes8', 'ggg'
            ]
        ];

        
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $imagePath = public_path('assets/img/apple-touch-icon.png'); // Replace with the actual path to your image

    //             // Add image to the header
    //             $event->sheet->getDelegate()->getHeaderFooter()->setOddHeader("&G" . $imagePath);
    //         },
    //     ];
    // }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/img/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('E1');

        return $drawing;
    }
    public function registerEvents(): array
    {
        return [



            // BeforeSheet::class => function (BeforeSheet $event) {
            //     // Menambahkan header
            //     $event->sheet->getDelegate()->mergeCells('A1:D1');
            //     $event->sheet->getDelegate()->setCellValue('A1', 'Your Head');

            //     // Menambahkan logo
            //     $logoPath = public_path('assets/img/logo.png');
            //     $event->sheet->getDelegate()->drawingObjects->offsetSetByIndex(
            //         0,
            //         new Drawing($logoPath)
            //     );
            // },
            
            AfterSheet::class => function (AfterSheet $event) {
                
                // Merge cells in a specific range
                $event->sheet->getDelegate()->mergeCells('B1:C1');
                $event->sheet->getDelegate()->mergeCells('D1:G1');
                
                // You can also dynamically determine the range based on your data
                // $lastRow = count($this->data) + 1;
                // $event->sheet->getDelegate()->mergeCells("A1:B{$lastRow}");

                // Add a label or text to the merged cell
                // $event->sheet->getDelegate()->setCellValue('A1', 'Nama');
                // $event->sheet->getDelegate()->setCellValue('C1', 'Detail');
            },
        ];
    }
  
}



