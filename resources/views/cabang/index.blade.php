@extends('layouts.aplikasi')

@section('title', 'Data Cabang')

@section('konten')
<div class="pagetitle">
    <h1>Data Cabang</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Cabang</h5>
                    <div class="mb-3">
                        <a href="{{ route('cabang.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Cabang
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
                                    <th>Nama Cabang</th>
                                    <th>Lokasi</th>
                                    <th>Area</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cabangs as $cabang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cabang->nama_cabang }}</td>
                                        <td>{{ $cabang->lokasi }}</td>
                                        <td>{{ $cabang->area }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('cabang.show', $cabang->id) }}" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('cabang.edit', $cabang->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('cabang.destroy', $cabang->id) }}" method="POST" class="delete-form">
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
