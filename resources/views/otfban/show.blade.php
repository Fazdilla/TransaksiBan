@extends('layouts.aplikasi')

@section('title', 'Detail OTF Ban')

@section('konten')
<div class="pagetitle">
    <h1>Detail OTF Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi OTF Ban</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="30%">Cabang</th>
                                    <td>{{ $otfban->cabang->nama_cabang }}</td>
                                </tr>
                                <tr>
                                    <th>Ban</th>
                                    <td>{{ $otfban->ban->kode_ban }}</td>
                                </tr>
                                <tr>
                                    <th>Kendaraan</th>
                                    <td>{{ $otfban->kendaraan->nopol }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal OTF</th>
                                    <td>{{ $otfban->tanggal_otf }}</td>
                                </tr>
                                <tr>
                                    <th>Posisi Ban</th>
                                    <td>{{ $otfban->posisi_ban }}</td>
                                </tr>
                                <tr>
                                    <th>Status Ban</th>
                                    <td>{{ $otfban->nama_status_ban }}</td>
                                </tr>
                                <tr>
                                    <th>KM Tempuh</th>
                                    <td>{{ $otfban->km_tempuh_otf }}</td>
                                </tr>
                                <tr>
                                    <th>Ketebalan</th>
                                    <td>{{ $otfban->ketebalan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('otfban.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('otfban.edit', $otfban->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
