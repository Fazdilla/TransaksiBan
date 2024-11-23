@extends('layouts.aplikasi')

@section('title', 'Detail Ban')

@section('konten')
<div class="pagetitle">
    <h1>Detail Ban</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Ban</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th width="30%">No Seri</th>
                                    <td>{{ $ban->no_seri }}</td>
                                </tr>
                                <tr>
                                    <th>Merek</th>
                                    <td>{{ $ban->merek }}</td>
                                </tr>
                                <tr>
                                    <th>Ukuran</th>
                                    <td>{{ $ban->ukuran }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $ban->type }}</td>
                                </tr>
                                <tr>
                                    <th>Status Awal</th>
                                    <td>{{ $ban->status_awal }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('ban.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('ban.edit', $ban->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
