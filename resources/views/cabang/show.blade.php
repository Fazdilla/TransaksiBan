@extends('layouts.aplikasi')

@section('title', 'Detail Cabang')

@section('konten')
<div class="pagetitle">
    <h1>Detail Cabang</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Cabang</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="30%">Nama Cabang</th>
                                    <td>{{ $cabang->nama_cabang }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $cabang->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>{{ $cabang->area }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('cabang.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('cabang.edit', $cabang->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
