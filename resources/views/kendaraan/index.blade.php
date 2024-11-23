@extends('layouts.aplikasi')

@section('title', 'Data Kendaraan')

@section('konten')
<div class="pagetitle">
    <h1>Data Kendaraan</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Kendaraan</h5>
                    <div class="mb-3">
                        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Kendaraan
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Polisi</th>
                                    <th>Kapasitas</th>
                                    <th>Kategori Kendaraan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kendaraans as $kendaraan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kendaraan->nopol }}</td>
                                        <td>{{ $kendaraan->kapasitas }}</td>
                                        <td>{{ $kendaraan->kategori_kend }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('kendaraan.show', $kendaraan->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endpush
