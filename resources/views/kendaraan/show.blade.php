@extends('layouts.aplikasi')

@section('title', 'Detail Kendaraan')

@section('konten')
<div class="pagetitle">
    <h1>Detail Kendaraan</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Kendaraan</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="30%">No. Polisi</th>
                                    <td>{{ $kendaraan->nopol }}</td>
                                </tr>
                                <tr>
                                    <th>Kapasitas</th>
                                    <td>{{ $kendaraan->kapasitas }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori Kendaraan</th>
                                    <td>{{ $kendaraan->kategori_kend }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
