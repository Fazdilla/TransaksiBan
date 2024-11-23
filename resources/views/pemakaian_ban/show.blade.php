@extends('layouts.aplikasi')

@section('title', 'Detail Pemakaian Ban')

@section('konten')
<div class="pagetitle">
    <h1>Detail Pemakaian Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Pemakaian Ban</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="200">Cabang</th>
                                    <td>{{ $pemakaianBan->cabang->nama_cabang }}</td>
                                </tr>
                                <tr>
                                    <th>No Seri Ban</th>
                                    <td>{{ $pemakaianBan->ban->no_seri }} - {{ $pemakaianBan->ban->merek }}</td>
                                </tr>
                                <tr>
                                    <th>Kendaraan</th>
                                    <td>{{ $pemakaianBan->kendaraan->nopol }} - {{ $pemakaianBan->kendaraan->kategori_kend }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pemakaian</th>
                                    <td>{{ $pemakaianBan->tanggal_pemakaian }}</td>
                                </tr>
                                <tr>
                                    <th>Posisi Ban</th>
                                    <td>{{ $pemakaianBan->posisi_ban }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="200">No WO</th>
                                    <td>{{ $pemakaianBan->no_wo }}</td>
                                </tr>
                                <tr>
                                    <th>Status Ban</th>
                                    <td>{{ $pemakaianBan->nama_status_ban }}</td>
                                </tr>
                                <tr>
                                    <th>KM Awal</th>
                                    <td>{{ $pemakaianBan->km_awal }}</td>
                                </tr>
                                <tr>
                                    <th>KM Tempuh</th>
                                    <td>{{ $pemakaianBan->km_tempuh }}</td>
                                </tr>
                                <tr>
                                    <th>Ketebalan</th>
                                    <td>{{ $pemakaianBan->ketebalan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('pemakaian_ban.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('pemakaian_ban.edit', $pemakaianBan->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
